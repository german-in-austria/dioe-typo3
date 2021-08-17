const { strict } = require('assert')
const fs = require('fs')

const jsonDir = "../Json/"

console.log('Statistik:')

let aJsonFile = fs.readFileSync(jsonDir + '/export.json', 'utf8')

let aJson = JSON.parse(aJsonFile)

console.log('Einträge: ', aJson.length)

let aFelder = {}
let aFelderCount = 0
aJson.forEach(e => {
  aFelder = getFelder(aFelder, e)
})
function getFelder(fFelder, e) {
  Object.keys(e).forEach(aF => {
    let f = aF
    if (f === parseInt(f).toString()) {
      f = '#num#'
    }
    if (!fFelder[f]) {
      fFelder[f] = {
        type: null,
        count: 0,
        values: []
      }
      aFelderCount += 1
    }
    fFelder[f].count += 1
    let aType = Array.isArray(e[aF]) ? 'array' : typeof e[aF]
    if (!fFelder[f].type || (fFelder[f].type !== aType && fFelder[f].type.indexOf(aType) < 0)) {
      if (fFelder[f].type) {
        if (!Array.isArray(fFelder[f].type)) {
          fFelder[f].type = [fFelder[f].type]
        }
        fFelder[f].type.push(aType)
      } else {
        fFelder[f].type = aType
      }
    }
    if (aType === 'object') {
      if (!fFelder[f].children) {
        fFelder[f].children = {}
      }
      fFelder[f].children = getFelder(fFelder[f].children, e[aF])
    } else {
      if (fFelder[f].values.indexOf(e[aF]) < 0) {
        fFelder[f].values.push(e[aF])
      }
    }
  })
  return fFelder
}

var aKategorien = []
aFelder = cleanFelderValue(aFelder)
function cleanFelderValue (fFelder) {
  Object.keys(fFelder).forEach(f => {
    if (f === 'kategorien') {
      fFelder[f].values.forEach(kl => {
        kl.split(',').forEach(k => {
          if (aKategorien.indexOf(parseInt(k)) < 0) {
            aKategorien.push(parseInt(k))
          }
        })
      })
    }
    fFelder[f].values = fFelder[f].values.length
    if (fFelder[f].children) {
      fFelder[f].children = cleanFelderValue(fFelder[f].children)
    }
  })
  return fFelder
}
aKategorien = aKategorien.sort((a, b) => a - b)

console.log('Felder:', aFelderCount, Object.keys(aFelder).length)

console.log('Kategorien:', aKategorien.length)

var aIntLinks = []

const regexp = new RegExp('href=\\\\"(t3:[^"]+)\\\\"','g')
let match
while ((match = regexp.exec(aJsonFile)) !== null) {
  if (match[1]) {
    let aLnk = match[1].split('#')
    if (aIntLinks.indexOf(aLnk[0]) < 0) {
      aIntLinks.push(aLnk[0])
    }
  }
}

console.log('Interne Links:', aIntLinks.length)

fs.writeFileSync(jsonDir + '/statistik.json', JSON.stringify({
  'Einträge': aJson.length,
  'Interne Links': aIntLinks,
  'Felder': aFelder,
  'Felder Anzahl': aFelderCount,
  'Kategorien': aKategorien,
}, null, 2))

console.log('Gespeichert.')

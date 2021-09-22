const fs = require('fs');


const csvDir = "../Csv/"
const jsonDir = "../Json/"

console.log('Start ...')

let aCsvFilenamesData = fs.readFileSync(csvDir + '/filenames.csv', 'utf8');
let aCsvMetainfosData = fs.readFileSync(csvDir + '/metainfos.csv', 'utf8');

let aFilenames = {}
let dg = 0
aCsvFilenamesData.split('\r\n').forEach(aLine => {
  if (dg > 0 && aLine) {
    aLineArr = aLine.split(',')
    aFilenames[aLineArr[0].replace(/"/g, '')] = aLineArr[1].substring(1, aLineArr[1].length - 1)
  }
  dg++
})

let aMetaData = []
dg = 0
aCsvMetainfosData.split('\r\n').forEach(aLine => {
  if (dg > 0 && aLine) {
    aLineArr = aLine
    aLineArr = aLine.split('","')
    aLineArr[0] = aLineArr[0].substring(1, aLineArr[0].length)
    if (aLineArr[4]) {
      aLineArr[4] = aLineArr[4].substring(0, aLineArr[4].length - 1)
    }
    if (aFilenames[aLineArr[0]]) {
      aLineArr[0] = aFilenames[aLineArr[0]]
    } else {
      console.log(aLineArr)
    }
    aMetaData.push(aLineArr)
  }
  dg++
})

fs.writeFileSync(jsonDir + '/exportCopyRights.json', JSON.stringify(aMetaData, null, 2));

console.log('Done!')

// console.log(aMetaData)
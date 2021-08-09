const fs = require('fs');
const jsdom = require("jsdom");
const { JSDOM } = jsdom;


const htmlDir = "../Html/"
const jsonDir = "../Json/"

var htmlData = ''

var dom = new JSDOM();
fs.readdirSync(htmlDir).filter(f => f.split('.').slice(-1)[0] === 'html').forEach(fileName => {
  // let htmlTmp = dom.window.document.createElement('DIV');
  // htmlTmp.innerHTML = 
  // let aHtmlData = htmlTmp.querySelector('.start').innerHTML;
  let aHtmlData = fs.readFileSync(htmlDir + '/' + fileName, 'utf8'); // start
  htmlData += aHtmlData
  console.log(fileName, aHtmlData.length);
})

var htmlDataDom = dom.window.document.createElement('DIV');
htmlDataDom.innerHTML = htmlData
var htmlDataLines = htmlDataDom.querySelectorAll(".start");

console.log('htmlData', htmlData.length, htmlDataLines.length);

var jsonList = []

function childrenData(children) {
  let article = {};
  for (let i = 0; i < children.length; i++) {
    let v = children[i];
    let fieldEl = getChildByTagName(v, 'b');
    let dataEl = getChildByTagName(v, 'div') || getChildByTagName(v, 'ul');
    let field = fieldEl ? (fieldEl.innerText||fieldEl.textContent).replace(':', '').trim() : null;
    if (v.childElementCount === 2 && fieldEl && dataEl) {
      if (dataEl.childElementCount === 0) {
        article[field] = htmlDecode((dataEl.innerText||dataEl.textContent).trim())
      } else {
        if (dataEl.tagName.toLowerCase() === 'div' || dataEl.tagName.toLowerCase() === 'ul') {
          article[field] = childrenData(dataEl.children);
        } else {
          article[field] = 'XXXXXX ' + dataEl.tagName + ' ' + dataEl.childElementCount;
        }
      }
    } else {
      let fxUel = getChildByTagName(v, 'u');
      let fxIel = getChildByTagName(v, 'i');
      if (fieldEl && (v.childElementCount === 1 || fxUel || fxIel)) {
        let fileOut = {}
        fileOut['file'] = field;
        if (fxUel && (fxUel.innerText||fxUel.textContent).trim().length > 0) {
          fileOut['title'] = htmlDecode((fxUel.innerText||fxUel.textContent).trim());
        }
        if (fxIel && (fxIel.innerText||fxIel.textContent).trim().length > 0) {
          fileOut['comment'] = htmlDecode((fxIel.innerText||fxIel.textContent).trim());
        }
        article[i] = fileOut;
      } else {
        article[field || i] = childrenData(v.children);
      }
    }
  }
  return article
}

htmlDataLines.forEach(l => {
  console.log(l.childElementCount);
  jsonList.push(childrenData(l.children));
})

fs.writeFileSync(jsonDir + '/export.json', JSON.stringify(jsonList, null, 2));


function getChildByTagName (el, tagName) {
  for (let i = 0; i < el.children.length; i++) {
    if (el.children[i].tagName.toLowerCase() === tagName) {
      return el.children[i]
    }
  }
  return null
}

function htmlDecode (input){
  var e = dom.window.document.createElement('textarea');
  e.innerHTML = input;
  return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
}
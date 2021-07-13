function getTemplate(name) {
  var h = document.querySelector('.'+ name +'-template').innerHTML
  document.querySelector('.'+ name +'-template').innerHTML = ''
  return h
}

function getFormValues() {
  return $('form.personal').serializeArray()
}

$.fn.memeGenerator("i18n", "de", {
  topTextPlaceholder: "TEXT OBEN",
  bottomTextPlaceholder: "TEXT UNTEN",
  addTextbox: "Textfeld hinzufügen",
})

$(document).ready(function(){
  $('form.memeform').attr('novalidate','');
  $("#meme").memeGenerator({
    // useBootstrap: true,
    layout: 'horizontal',
    defaultTextStyle: {
      color: "#FFFFFF",
      size: 80,
      lineHeight: 1.2,
      font: "Impact, Arial",
      style: "normal",
      forceUppercase: true,
      borderColor: "#000000",
      borderWidth: 4,
    },
    showAdvancedSettings: false,
    captions: [
      'Text oben',
      'Text unten'
    ],
    onInit: () => {
      $("#save").click(function(e){
        e.preventDefault()
        e.stopPropagation()
        var form = document.querySelector('form.personal')
        var texte = JSON.parse($("#meme").memeGenerator("serialize"));
        var textArray = [];
        var text = '';
        if (Array.isArray(texte)) {
          texte.forEach(function (aText) {
            if (aText.text.trim().length > 0) {
              textArray.push(aText.y + '#' + aText.text.trim());
            }
          });
          text = textArray.join('|');
        }
        $('#memetexte').val(text);
        console.log(text, textArray);
        if (textArray.length < 1) {
          alert('Es muss ein Text im Bild angegeben werden!');
        } else if (form.checkValidity() === false) {
          alert('Bitte alle benötigten Felder ausfüllen!');
          form.classList.add('error');
          $('form.personal [required]').each(function () {
            if (this.checkValidity()) {
              $(this).parent().removeClass('has-error');
            } else {
              $(this).parent().addClass('has-error');
            }
          });
        } else {
          console.log('valid')
          form.classList.add('valid');
          var imageDataUrl = $("#meme").memeGenerator("save")
          $('#imagefield').val(imageDataUrl);
          $("#meme").memeGenerator("download", "meme.png");
          $("#save").attr('disabled', true);
          $.ajax({
            url: $('form.memeform').attr('action'),
            type: "POST",
            data: $('form.personal').serialize(),
            success: function(response) {
              console.log(response);
              $('.meme-generator').hide();
              $('.danksagung').show();
              $("#save").attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrow) {
              alert('Senden hat leider nicht geklappt!');
              console.log('Ajax request - ' + textStatus + ': ' + errorThrow);
              $("#save").attr('disabled', false);
            }
          })
        }
        form.classList.add('was-validated')
      })
    }
  })
  $('.images img').on('click', (e) => {
    function toDataURL(url, callback) {
      var xhr = new XMLHttpRequest();
      xhr.onload = function() {
        var reader = new FileReader();
        reader.onloadend = function() {
          callback(reader.result);
        }
        reader.readAsDataURL(xhr.response);
      };
      xhr.open('GET', url);
      xhr.responseType = 'blob';
      xhr.send();
    }
    $('img.active').removeClass('active')
    $(e.target).addClass('active')
    // toDataURL(e.target.src, function(dataUrl) {
    //   $('#meme').attr('src', dataUrl)
    // })
    $('#meme').attr('src', e.target.src)
  })
})

$(document).ready(function(){

let dropArea = document.getElementById("drop-area");

// Prevent default drag behaviors
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, preventDefaults, false)   
  document.body.addEventListener(eventName, preventDefaults, false)
});

// Highlight drop area when item is dragged over it
['dragenter', 'dragover'].forEach(eventName => {
  dropArea.addEventListener(eventName, highlight, false);
});

['dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, unhighlight, false);
});

// Handle dropped files
dropArea.addEventListener('drop', handleDrop, false);

function preventDefaults (e) {
  e.preventDefault();
  e.stopPropagation();
}

function highlight(e) {
  dropArea.classList.add('highlight');
}

function unhighlight(e) {
  dropArea.classList.remove('active');
}

function handleDrop(e) {
  var dt = e.dataTransfer;
  var files = dt.files;

  handleFiles(files);
}

function previewFile(file) {
    let reader = new FileReader();
    reader.readAsDataURL(file)
    reader.onloadend = function(e) {
        let myfile = e.target.result;
        let ext = myfile.split(';');
        let ext2 = ext[0].split('/');
        if(ext2[1] == "jpg" || ext2[1] == "png" || ext2[1] == "jpeg" || ext2[1]  == "pdf"){
            $('#avatar-review').attr('src', ''+ e.target.result +'');
            $('#avatar-review').hide();
            $('#avatar-hidden').attr('value', e.target.result);
            $('#avatar-review').fadeIn(650);
        } else{
            Swal(
                    'Invalid data ?',
                    'Invalid input file ?',
                    'question'
                )
        }
        
  }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#avatar-review').attr('src', ''+e.target.result +'');
            $('#avatar-review').hide();
            $('#avatar-review').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#fileElem").change(function() {
    readURL(this);
});

function handleFiles(files) {
    files = [...files];
    // files.forEach(uploadFile);
    files.forEach(previewFile)
}

var elem_3 = document.querySelector('.js-switch_3');
var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

});

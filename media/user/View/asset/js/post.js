
function choseFile(input) {
    var preview = document.querySelector('#imageList');

    if (input.files) {
        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        var filesAmount = input.files.length;
        for (let i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
                var listItem = document.createElement('li');
                var img = document.createElement('img');
                img.src = event.target.result;
                img.classList.add('preview-image');
                listItem.appendChild(img);
                preview.appendChild(listItem);
            }

            reader.readAsDataURL(input.files[i]);
        }
    }
}

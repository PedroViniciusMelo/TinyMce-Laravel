<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Bem-vindo ao tinyMce</title>
        <meta charset="utf-8"/>
        <script src="/tinymce/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                width: "70%",
                path_absolute : "/",
                selector: 'textarea',
                relative_urls: false,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code",
                image_title: true,
                automatic_uploads: true,
                file_picker_types: 'image',
                file_picker_callback: function (cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.onchange = function () {
                        var file = this.files[0];
                        var reader = new FileReader();

                        reader.onload = function () {
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            //Adiciona o blob no campo do caminho da imagem
                            cb(blobInfo.blobUri(), { title: file.name });
                        };
                        reader.readAsDataURL(file);
                    };
                    input.click();
                },
            });
        </script>
    </head>
    <body>
        <h1>Editor online tinyMCE</h1>
        <form method="post" action="{{url('/enviar')}}">
            @csrf
            <textarea name="content" id="editorContainer">Hello, World!</textarea>
            <button type="submit">Salvar</button>
        </form>
    </body>
</html>


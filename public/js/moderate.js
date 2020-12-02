$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Добавление
$('#addMovie').on('click', addMovie);
function addMovie(){
    let addContainer = $('#add-container');
    addContainer[0].style.display = 'block';
// HTML вставляю так что бы не сбрасывать листенеры.
    let html = `
        <div class="popup-content">
            <div class="popup-head">
                <h4>Добавление</h4>
                <img class="close-img" id="close-add" src="/images/close.svg">
            </div>
            <div id="create-fields">
                <label for="movie-name-create">Название</label>
                <input id="movie-name-create" type="text" value="">
                <br>

                <img class="poster" id="edit-image" src="/images/default-movie.png">
                <br>
                <form id="upload-form" method="post" enctype="multipart/form-data">
                        <div class="form-group" id="media-inputs-container">
                            <label for="custom-input-file" id="chose-file" class="btn btn-info">Выберите файл</label>
                            <input type="file" name="image" id="custom-input-file" accept="image/*" style="display:none;">
                            <p id="file-text">/images/default-movie.png</p>
                            <input type="submit" id="upload-img-btn"  class="btn btn-info" value="Загрузить">
                        </div>
                </form>
                <br>
                <label for="ganres-checked">Жанры</label>
                <p id="ganres-checked">
                <input type="checkbox" class="checkbox" value="1" checked>Боевик<Br>
                <input type="checkbox" class="checkbox" value="2">Комедия<Br>
                <input type="checkbox" class="checkbox" value="3">Фантастика<Br>
                </p>
                <button type="button" id="save-create" class="btn btn-success">Сохранить</button>
            </div>
        </div>
    `;
    addContainer.html(html);

    $('#close-add').on('click', function (){
        addContainer[0].style.display = 'none';
    });

    // Загрузка картинки
    uploadImage();

    // Сохранение изменений (без их проверки и валидации)
    $('#save-create').on('click', async function (){
        let fields = $('#create-fields')[0];

        let name = fields.querySelector('#movie-name-create').value;
        let img = fields.querySelector('#file-text').innerHTML;
        let checked = [];
        $("input:checkbox[class=checkbox]:checked").each(function(){
            checked.push($(this).val());
        });

        let response = await $.ajax({
            type: "POST",
            url: "moderate",
            data: {name: name, img:img, ganresIds:checked},
            dataType:'JSON',
            success: function(data) {
                return data;
            }
        });
        alert("response в консоле");
        console.log(response);
        addContainer[0].style.display = 'none';
    });

}

// Редактирование
$(document).on("click", `.edit`, function() { return editMovie(this)} );
async function editMovie(e){
    let editContainer = $('#edit-container');
    editContainer[0].style.display = 'block';

    let element = e.closest('tr');
    let id = element.querySelector('.mv-id').innerHTML;

    let movieInfo = await getMovieInfo(id);
    // movieInfo[0] - кино
    // movieInfo[1] - жанры

    let select;
    if(movieInfo[0].status === "published"){
        select = `
        <option value="unpublished">Unpublished</option>
        <option value="published" selected="selected">Published</option> `
    } else {
        select = `
        <option value="unpublished"  selected="selected">Unpublished</option>
        <option value="published">Published</option> `
    }

    // HTML вставляю так что бы не сбрасывать листенеры.
    let html = `
        <div class="popup-content">
            <div class="popup-head">
                <h4>Редактирование</h4>
                <img class="close-img" id="close-edit" src="/images/close.svg">
            </div>
            <div id="edit-fields">
                <label for="movie-name">Название</label>
                <input id="movie-name" type="text" value="`+ movieInfo[0].name +`">
                <br>

                <img class="poster" id="edit-image" src="`+ movieInfo[0].poster +`">
                <br>
                <form id="upload-form" method="post" enctype="multipart/form-data">
                        <div class="form-group" id="media-inputs-container">
                            <label for="custom-input-file" id="chose-file" class="btn btn-info">Выберите файл</label>
                            <input type="file" name="image" id="custom-input-file" accept="image/*" style="display:none;">
                            <p id="file-text"> `+ movieInfo[0].poster +` </p>
                            <input type="submit" id="upload-img-btn"  class="btn btn-info" value="Загрузить">
                        </div>
                </form>
                <br>
                <label for="status-select">Публикация</label>
                <select id="status-select">
                 `+ select +`
                </select>
                <br><br>
                <button type="button" id="save-edit" class="btn btn-success">Сохранить</button>
            </div>
        </div>
    `;
    editContainer.html(html);

    $('#close-edit').on('click', function (){
        editContainer[0].style.display = 'none';
    });

    // Загрузка картинки
    uploadImage();

    // Сохранение изменений (без их проверки и валидации)
    $('#save-edit').on('click', async function (){
        let fields = $('#edit-fields')[0];

        let name = fields.querySelector('#movie-name').value;
        let img = fields.querySelector('#file-text').innerHTML;
        let status = fields.querySelector('#status-select');
        status = $(status).children("option:selected").val();
        // id получен в начале

        let response = await $.ajax({
            type: "PUT",
            url: "moderate/"+id,
            data: {name: name, img:img, status:status},
            dataType:'JSON',
            success: function(data) {
                return data;
            }
        });
        alert(response);

        editContainer[0].style.display = 'none';
    });
}

// Удаление
$(document).on("click", `.delete`, function() { return deleteMovie(this)} );
async function deleteMovie(e){
    let element = e.closest('tr');
    let id = element.querySelector('.mv-id').innerHTML;

    let response = await $.ajax({
        type: "DELETE",
        url: "moderate/"+id,
        success: function(data) {
            return data;
        }
    });
    alert("response в консоле");
    console.log(response);
}


function getMovieInfo(id){
    let response = $.ajax({
        type: "GET",
        url: "moderate/"+id,
        data: {id:id},
        dataType:'JSON',
        success: function(data) {
            return data;
        }
    });
    return response;
}

function uploadImage(){
    $('#upload-form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url:"/uploadImage",
            method:"POST",
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                if (data.src !== undefined) {
                    $('#edit-image')[0].src = data.src;
                    $('#file-text').html(data.src);
                }
            }
        })
    });
}

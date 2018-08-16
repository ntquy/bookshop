/**
 * Created by ngocminh on 08/08/2018.
 */


function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('input[name=image]').change(function () {
        readURL(this);
    })
})
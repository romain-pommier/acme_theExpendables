$(document).ready(function () {
    $('.translate').each(function () {
        var itemToTranslate = $(this);
        $(itemToTranslate).on('click',function () {
            var destReturnApi = $(this).parent().prev('.destTranslation').children();
            $.ajax({
                type : 'GET',
                url: $(this).attr('href'),
            }).done(function(results) {
                var response = JSON.parse(results);
                var decoded = response.text.replace(/&#39;/g,"'");
                $(destReturnApi).val(decoded);
            }).fail(function () {
                console.log('fail');
            });
            return false;
        })
    });

    $('.translateAll').on('click', function () {
        var translateAllParent = $(this).parent().closest('.translateAllParent');

        $(translateAllParent).each(function () {

            var table = $(this).find('.table');
            var tabTranslate = [];

            $(table).find('tr').each(function () {
                tabTranslate.push($(this).find('.sourceTranslation').text());
            });
            $.ajax({
                type : 'GET',
                url: $('.translateAll').attr('href'),
                data:  { tab : tabTranslate },
            }).done(function(results) {
                var response = JSON.parse(results);
                $(table).find('tr').each(function (i) {
                    var decoded = response[i].replace(/&#39;/g,"'");
                    $(this).find('.destTranslation').children().val(decoded);
                });
            }).fail(function () {
                console.log('fail');
            });
        });
        return false;
    });
});

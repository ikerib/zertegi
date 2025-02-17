

$(document).ready(function () {

    console.log("CRUD-INDEX.JS");
    console.log("CRUD-INDEX.JS");
    console.log("CRUD-INDEX.JS");
    console.log("CRUD-INDEX.JS");
    console.log("CRUD-INDEX.JS");
    let empty = true;
    let text2highlight = [];
    $('input[type="text"]').each(function () {
        if ($(this).val() !== "") {
            let searchTerms = $(this).val().replace(/[|&;$%@"<>()+,*"]/g, "");
            const t = searchTerms.split(/[ ,]+/g);
            console.log(t);
            $.each(t, function (index, value) {
                console.log(value)
                text2highlight.push(value);
            });
            empty = false;
            return false;
        }
    });

    if (empty === false) { // datuak ditu beraz bilaketa da

        $('body').highlight(text2highlight);
    }

    $('form').each(function () {
        $(this).find('input').keypress(function (e) {
            // Enter pressed?
            if (e.which == 10 || e.which == 13) {
                this.form.submit();
            }
        });

        $(this).find('input[type=submit]').hide();
    });
});

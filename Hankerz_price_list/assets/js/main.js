$(document).ready(function() {

    $('.price .list-container input').on("change", ()=> {

        $('#total_price').val(get_total_price() + " EGP");

        add_currency_unit();

    });

    function add_currency_unit() {
        $('.price .list-container input').each(function() {

            $input_number = Number($(this).val());

            if($input_number > 0) {
                $(this).siblings("span").css("display","inline-block");
            } else {
                $(this).siblings("span").css("display","none");
            }
        });
    }

    function get_total_price() {
        $total = 0;
        $('.price .list-container input:not("#total_price,#discount")').each(function() {
            $total += Number($(this).val());
        });
            $total -= Number($('.price .list-container input#discount').val());

        return $total;
    }
    function download(dataurl, filename) {
        var a = document.createElement("a");
        a.href = dataurl;
        a.setAttribute("download", filename);
        a.click();
      }
      
    $('.logo').click(() => {
        $('.capture-details').fadeIn();
    });
    $('.capture-btn').click(() => {
        $('.capture-details').fadeOut();
        setTimeout(function () {

            html2canvas(document.body).then(canvas => {

                download(canvas.toDataURL(), $('#imageName').val() || (Math.floor(Math.random() * 1000)));
    
            });
    
        }, 1000)

    });
}); 
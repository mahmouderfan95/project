$(function(){
    /* delete confirm */
    $(".confirm").on('click',function(){
        return confirm('تأكيد الحذف ');
    });
    /** delete confirm  */

    /* img perview **/
        $(".image").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.img-perview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
            }
        });
        /* img perview **/

    /* toggle form search */
    $('i.fa-search').on('click',function(e){
        e.preventDefault();
        $('form.form-search').toggle(200);
    });
    /* toggle form search */


});

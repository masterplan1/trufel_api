(function($){
        $('.type-category > #product-type').on('change', function(){
            
            let val = $(this).val();
            let container = $('.product-category > #product-category_id');
            let obj = {
                'val': val,
            }; 
            $.post('/admin/product/category', obj, function(data){
                let out = '';
                for(var item in data.category){
                    out += '<option value="'+item+'">'+data.category[item]+'</option>';
                }
                container.html(out);
            });
        });
        
//        $('.typeAjax > .form-control').on('change', function(){
//            
//            let type = $(this).find('option:selected').attr('value');
//            console.log(type);
//        });
        
}(jQuery));


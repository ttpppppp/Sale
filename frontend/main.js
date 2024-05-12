   $(document).ready(function() {
    let suggestList = document.querySelector(".suggestList");
    let searchInput = document.getElementById("searchInput");
    let suggestSearch = document.querySelector(".suggestSearch");
    let inputSale = document.getElementById("inputSale");
    let btnSaleCheck = document.getElementById("btnSaleCheck");
        $(document).on("click", ".cart", function(e) {
            var productid = $(this).data('productid');
            var quantity = $(this).data('quantity');
            var count_element = $('.count');
            
            $.ajax({
                url: 'http://localhost/projectsale/index.php/add-to-cart',
                type: 'POST',
                dataType: "json",
                data: {
                    productid: productid,
                    quantity: quantity
                },
                success: function(response) {
                    $(".countLast").removeClass("countLast");
                    $('.count').html(response.cartCount);
                    if(response.success){
                        $(".noti").html(response.success);
                    }else{
                        $(".noti").html(response.warning);
                    }
                },
                error: function(xhr, status, error) {
                }
            });
        });
        $(document).on("click", ".searchSuggest", function(e){
            e.preventDefault();
            var keyword = $('#searchInput').val();
            var url = "http://localhost/projectsale/index.php/timkiem?keyword=" + encodeURIComponent(keyword);
            $.ajax({
                url: url, 
                type: 'GET',
                data: { keyword: keyword }, 
                success: function(response) {
                    window.location.href = url;
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
       $(document).on("click", ".delete-link", function(e){
            e.preventDefault();
            var rowid = $(this).data('rowid');
            $.ajax({
                url: "delete-cart", 
                type: "POST",
                dataType: "json",
                data: { 
                    rowid: rowid
                },
                success: function(response){
                    $(".giohang").html(response.html);
                    $(".total_amount").html(response.html_total);
                    $('.count').html(response.html_count);
                },
                error: function(){
                }
            });
        });

        $(".deleteAllCart").click(function(e){
            $.ajax({
                url: "delete-all", 
                type: "GET",
                dataType: "json",
                success: function(response){
                    $(".giohang").html(response.html);
                    $(".total_amount").html(response.html_total);
                    console.log(response);
                },
                error: function(){
                    alert("Đã xảy ra lỗi khi gửi yêu cầu xóa!");
                }
            });
        });
         $(document).on("click", ".addCount", function(e){
            var rowid = $(this).data('rowid');
            var qty = $(this).data('qty');
            $.ajax({
                url: "updateCart", 
                type: "POST",
                dataType: "json",
                data: { 
                    rowid: rowid,
                    qty : qty
                },
                success: function(response){
                    $('[data-rowid="' + rowid + '"]').val(response.qty);
                    var newQty = parseInt(qty) + 1;
                    $('[data-rowid="' + rowid + '"]').data('qty', newQty);
                    $('.total[data-rowid="' + rowid + '"]').html(response.html);
                    $(".total_amount").html(response.total);
                },
                error: function(){
                    
                }
            });
        });
        $(document).on("click", ".minusCount", function(e){
            var rowid = $(this).data('rowid');
            var qtyMinus = $(this).data('qty');
            $.ajax({
                url: "updateCart", 
                type: "POST",
                dataType: "json",
                data: {
                    rowid: rowid,
                    qtyMinus : qtyMinus
                },
                success: function(response){
                    $('[data-rowid="' + rowid + '"]').val(response.qty);
                    var newQty = parseInt(qtyMinus) - 1;
                    $('[data-rowid="' + rowid + '"]').data('qty', newQty);
                    $('.total[data-rowid="' + rowid + '"]').html(response.html);
                    $(".total_amount").html(response.total);
                },
                error: function(){
                    
                }
            });
        });
        $(".addDetails").click(function(e){
            var productid = $(this).data('productid');
            var quantity = $(".quantityDetails").val();
            $.ajax({
                url: "http://localhost/projectsale/index.php/add-to-cart", 
                type: "POST",
                dataType: "json",
                data: {
                    productid: productid,
                    quantity: quantity
                },
                success: function(response){
                    $(".countLast").removeClass("countLast");
                    $('.count').html(response.cartCount);
                     if(response.success){
                        $(".noti").html(response.success);
                    }else{
                        $(".noti").html(response.warning);
                    }
                },
                error: function(){
                    
                }
            });
        });
        $('#xulydonhang').change(function() {
            var selectedValue = $(this).val();
            var ordercode = $(this).find('option:selected').data('order-code');
            $.ajax({
                url: "http://localhost/projectsale/index.php/order/process", 
                type: 'POST',
                data: { 
                    valueProcess: selectedValue,
                    ordercode : ordercode 
                }, 
                success: function(response) {
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
        $('#select-filter').change(function() {
            var selectedValue = $(this).val();
            var slug = $("#slug").val();
            var url = "http://localhost/projectsale/index.php/changeFillter/" + slug;
            $.ajax({
                url: url, 
                type: 'GET',
                data: { gia: selectedValue },
                beforeSend: function() {
                     $(".categoriesProducts").html('<div class="alert alert-primary mt-3 text-center" role="alert">Đang tải...</div>');
                },
                success: function(response) {
                    $(".categoriesProducts").html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle errors here
                }
            });
        });

        $(".brandFillter").click(function(e){
            $(".brandFillter").removeClass("activeBorder");
            $(this).addClass("activeBorder");
            var brandid = $(this).data('brandid');
            var slug = $("#slug").val();
            var url = "http://localhost/projectsale/index.php/changeFillter/" + slug;
            $.ajax({
                url: url, 
                type: "GET",
                data: {
                    brandid: brandid,
                },
                beforeSend: function() {
                     $(".categoriesProducts").html('<div class="alert alert-primary mt-3 text-center" role="alert">Đang tải...</div>');
                },
                success: function(response){
                     $(".categoriesProducts").html(response);
                },
                error: function(){
                    
                }
            });
        });
        $("#addBtn").click(function(){
            var input = $("input[name='quantity']");
            var currentValue = parseInt(input.val());
            input.val(currentValue + 1);
        });
        $("#minusBtn").click(function(){
            var input = $("input[name='quantity']");
            var currentValue = parseInt(input.val());
            if(input.val() > 1){
                input.val(currentValue - 1);
            }
        });

        $('input[type="radio"][name="price"]').change(function(){
        var slug = $("#slug").val();
        var selectedPrice = $(this).val();
        var minPrice = parseInt($(this).data('min'));
        var maxPrice = parseInt($(this).data('max'));
        var url = "http://localhost/projectsale/index.php/changeFillter/" + slug;
        $.ajax({
            url: url,
            method: 'GET',
            data: 
            {
                min_price: minPrice,
                max_price: maxPrice 
            },
            beforeSend: function() {
                $(".categoriesProducts").html('<div class="alert alert-primary mt-3 text-center" role="alert">Đang tải...</div>');
            },
            success: function(response) {
                $(".categoriesProducts").html(response);
            },
            error: function(xhr, status, error) {

            }
        });
        });
        let data;
        $.ajax({
            url: 'http://localhost/projectsale/index.php/get-api',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                data = response.data;
                initApp(data);
            },
            error: function(xhr, status, error) {
            }
        });
        let userInput = true;
        searchInput.addEventListener("input", function(e) {
            writting.innerHTML = e.target.value;
            var searchValue = e.target.value.trim().toLowerCase();
            var filteredItems = data.filter(item => item.title.trim().toLowerCase().replace(/\s/g, '').includes(searchValue));
            if (filteredItems.length > 0) {
                initApp(filteredItems); 
                suggestSearch.classList.add("hihe");
            } else {
                suggestSearch.classList.remove("hihe"); 
            }
        });
        function initApp(data) {
            suggestList.innerHTML = "";

            var hot = document.createElement('div');
            hot.classList.add("d-flex");
            hot.classList.add("justify-content-between");
            hot.classList.add("align-items-center");
            hot.classList.add("mb-2");
            hot.classList.add("trend");
            var hotText = document.createElement('span');
            hotText.textContent = '#ShopXuHuong VOUCHER';

            var hotImage = document.createElement('img');
            hotImage.src = "https://down-vn.img.susercontent.com/file/sg-11134019-7rd6q-luyleu203akgf8";
            hot.appendChild(hotText); 
            hot.appendChild(hotImage);
            suggestList.appendChild(hot);

            data.forEach(item => {
                var newProduct = document.createElement('p');
                newProduct.classList.add("searchSuggest");
                newProduct.textContent = item.title.trim().toLowerCase().replace(/\s/g, '');
                newProduct.addEventListener("click", function() {
                    searchInput.value = item.title;
                    suggestSearch.classList.remove("hihe");
                });
                suggestList.appendChild(newProduct);
            });
        }
        $('.btnCopy').click(function() {
            var textToCopy = $(this).attr('data-text');
            var tempInput = $('<input>');
            tempInput.val(textToCopy);
            $('body').append(tempInput);
            tempInput.select();
            document.execCommand('copy');
            tempInput.remove();
            alert('Mã giảm giá của bạn là: ' + textToCopy);
        });
       inputSale.addEventListener("input", function(e) {
            if(inputSale.value !== '') {
                btnSaleCheck.classList.add('backgroundSale');
            } else {
                btnSaleCheck.classList.remove('backgroundSale');
            }
        });
});
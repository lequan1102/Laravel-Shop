document.addEventListener("DOMContentLoaded", function(){
    /*Menu Dropdown list*/
    var viewa = document.getElementsByClassName('viewa'),
    submenu = document.getElementsByClassName('treeview-menu');
    for (var i = 0; i < viewa.length; i++) {
        viewa[i].onclick = function (){
            if (this.parentElement.classList[1] == 'color_sidebar') {
                var content = this.getAttribute('data-show');
                var section_show = document.getElementById(content);
                section_show.classList.toggle('menu-open');
            } else {
                for(var k = 0; k < viewa.length; k++){
                    viewa[k].parentElement.classList.remove('color_sidebar');
                }
                this.parentElement.classList.toggle('color_sidebar');
                var content = this.getAttribute('data-show');
                var section_show = document.getElementById(content);
                for(var i = 0; i < submenu.length; i++){
                    submenu[i].classList.remove('menu-open');
                }
                section_show.classList.toggle('menu-open');
            }
        }
    }
    /*CKFINDER 3*/
    var upload_image = document.getElementById( 'image' );
    if (upload_image != null){
        upload_image.onclick = function() {
          selectFileWithCKFinder( 'image' );
        };
        function selectFileWithCKFinder( elementId ) {
          CKFinder.popup({
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    var output = document.getElementById( elementId );
                    output.value = file.getUrl();

                    var linknode = document.createElement("img");
                        linknode.setAttribute("src", file.getUrl());
                    document.querySelector('.dropify-wrapper').classList.add('has-preview');
                    var dropifyPreview  = document.querySelector(".dropify-preview");
                        dropifyPreview.style.display = 'block';
                    var dropify  = document.querySelector(".dropify-render");
                        dropify.appendChild(linknode);
                    var img_fropify = document.querySelectorAll(".dropify-render img");
                    for (var i = 1; i < img_fropify.length ; i++) {
                        img_fropify[0].remove();
                    }
                });
                finder.on( 'file:choose:resizedImage', function( evt ) {
                    var output = document.getElementById( elementId );
                    output.value = evt.data.resizedUrl;
                });
            }
          });
        }
    }
    /*Cookie*/
    var button_layout_mobie = document.getElementById('reponmb'),
    button_layout_pc = document.getElementById('reponpc'),
    sidebar = document.querySelector('.sidebar-menu');
    content_wrapper = document.querySelector('.content-wapper');
    header = document.querySelector('header');
    alnk = document.querySelectorAll('.viewa');

    function layoutpc(){
        button_layout_pc.classList.toggle('display');
        button_layout_mobie.classList.toggle('display');
        sidebar.classList.remove('smll');
        content_wrapper.style.marginLeft = '230px';
        header.style.padding = '0px 15px 0px 230px';
        for (let i = 0; i < alnk.length; i++){
            alnk[i].style.color = '#76838f';
            alnk[i].style.textIndent = '0px';
            alnk[i].style.zIndex = '1';
        }
        Cookies.set('MenuSmall','false');
    }
    function layoutmb(){
        button_layout_pc.classList.toggle('display');
        button_layout_mobie.classList.toggle('display');
        sidebar.classList.add('smll');
        content_wrapper.style.marginLeft = '60px';
        header.style.padding = '0px 15px 0px 60px';
        for (let i = 0; i < alnk.length; i++){
            alnk[i].setAttribute('style', 'color:transparent !important');
            alnk[i].style.textIndent = '5px';
            alnk[i].style.zIndex = '-1';
        }
        Cookies.remove('MenuSmall');
    }
    /*Change layout pc*/
    button_layout_mobie.addEventListener('click', layoutmb);
    /*Change layout mobie*/
    button_layout_pc.addEventListener('click', layoutpc);

    var MyCookies = Cookies.get('MenuSmall');
    if  (MyCookies == 'false')/*Check cookie 230*/
    {
        button_layout_pc.classList.remove('display');
        button_layout_mobie.classList.add('display');
        sidebar.classList.remove('smll');
        content_wrapper.style.marginLeft = '230px';
        header.style.padding = '0px 15px 0px 230px';
        for (let i = 0; i < alnk.length; i++){
            alnk[i].style.color = '#76838f';
            alnk[i].style.textIndent = '0px';
            alnk[i].style.zIndex = '1';
        }
    } else if (!MyCookies)/*Check cookie 60*/
    {
        button_layout_pc.classList.add('display');
        button_layout_mobie.classList.remove('display');
        sidebar.classList.add('smll');
        content_wrapper.style.marginLeft = '60px';
        header.style.padding = '0px 15px 0px 60px';
        for (let i = 0; i < alnk.length; i++){
            alnk[i].setAttribute('style', 'color:transparent !important');
            alnk[i].style.textIndent = '5px';
            alnk[i].style.zIndex = '-1';
        }
    }
    /*Datatable*/
    $('#checkAll').click(function () {
        $('input:checkbox').prop('checked', this.checked);
    });
    var table_vi = document.getElementById('example');
    var table_en = document.getElementById('example2');
    if(table_vi != null){
        $('#example').DataTable({
            "bPaginate": false,
            "bInfo": false,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ mục mỗi trang",
                "zeroRecords": "Không tìm thấy dữ liệu - xin lỗi",
                "info": "Đang xem trang _PAGE_ của _PAGES_",
                "infoEmpty": "Không có hồ sơ",
                "infoFiltered": "(được lọc từ _MAX_ tổng số hồ sơ)",
                "search": "Tìm kiếm:",
            },
            "columnDefs": [
                { "orderable": false, "targets": 0 }
            ]
        });
    }
    if(table_en != null){
        $('#example2').DataTable({
            "bPaginate": false,
            "bInfo": false,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ mục mỗi trang",
                "zeroRecords": "Không tìm thấy dữ liệu - xin lỗi",
                "info": "Đang xem trang _PAGE_ của _PAGES_",
                "infoEmpty": "Không có hồ sơ",
                "infoFiltered": "(được lọc từ _MAX_ tổng số hồ sơ)",
                "search": "Tìm kiếm:",
            },
            "columnDefs": [
                { "orderable": false, "targets": 0 }
            ]
        });
    }
    /*Dropdown list animation*/
    $( ".dropdown_slug" ).click(function() {
        $( ".input_slug" ).slideToggle( "medium", function() {
            // Animation complete.
        });
    });
    $( ".dropdown_seo" ).click(function() {
        $( ".body_seo" ).slideToggle( "medium", function() {
            // Animation complete.
        });
    });
    $(window).on('load', function(event) {
        $('wrapper_spinner').removeClass('active');
        $('.wrapper_spinner').delay(50).fadeOut('fast');
    });



    var price = document.querySelector('.price');
    if (price != null){
        $('#discount_price, #price').maskNumber({
            integer:true,
            thousands:'.'
        });
    }
    
}, false)
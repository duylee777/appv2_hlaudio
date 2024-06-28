@extends('admin.layouts.index')
 
@section('title', 'Quản lý bình luận')

<style type="text/css">
    /* search comment */
    .paginate-comment{
        width: 100%;
        justify-content: right;
        display: flex;
    }

    .page-container {
        width: fit-content;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 2rem;
        background-color: #fff;
        box-shadow: 0 0 10px #d3d3d3;
        border-radius: 5px;
        padding: 10px 15px;
    }
    
    .page-container button {
        cursor: pointer;
        background-color: transparent;
        border: none;
    }

    /* .page-container button:hover{
        background-color: #39f;
    } */

    .page-container i {
        padding: 6px 12px;
        cursor: pointer;
        font-size: 18px;
        color: #000;
        pointer-events: none;
    }

    .page-container button:disabled i {
        color: #aaadc7;
    }

    .page-container button {
        cursor: pointer;
        background-color: transparent;
        border: none;
    }

    #pagination {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }

    #pagination li {
        list-style: none;
        cursor: pointer;
        border-radius: 5px;
        overflow: hidden;
        margin: 0 3px;
    }

    #pagination li:hover {
        background-color: #39f;
    }

    #pagination li a {
        text-decoration: none;
        font-weight: 600;
        padding: 8px 13px;
        display: inline-block;
        line-height: 1;
        color: #000;
        font-size: 14px;
        pointer-events: none;
    }

    #pagination li.active {
        background-color: #39f;
    }  

</style>

@section('content')

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
            </a>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Quản lý bình luận</span>
            </div>
        </li>
    </ol>
</nav>

@if($errors->any())
<ul>
    @foreach( $errors->all() as $error)
    <li>
        <span class="text-red-300">{{$error}}</span>
    </li>
    @endforeach
</ul>
@endif

<section class="bg-gray-50 dark:bg-gray-900 py-4 sm:py-5 mt-5">
    <div class="px-4 mx-auto max-w-screen-2xl">
        <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
            <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                <div class="flex items-center flex-1 space-x-4">
                    <h2 class="text-black text-2xl font-semibold">Danh sách bình luận</h2>
                </div>
                <!-- Search form -->
                <div class="flex-1">
                    <div class="flex items-center max-w-lg mx-auto">   
                        <div class="relative w-full"> 
                            <input type="text" id="comment-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5" placeholder="Tìm kiếm bình luận ..." required />
                            <button type="button" class="absolute inset-y-0 end-0 flex items-center pe-3">
                                <svg class="w-4 h-4 me-2 text-blue-500 hover:text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- --------- -->
            <div class="overflow-x-auto pb-20">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <!-- <th scope="col" class="px-4 py-3">ID</th> -->
                            <th scope="col" class="px-4 py-3">ID</th>
                            <th scope="col" class="px-4 py-3">Loại</th>
                            <th scope="col" class="px-4 py-3">Tiêu đề</th>
                            <th scope="col" class="px-4 py-3">Người viết</th>
                            <th scope="col" class="px-4 py-3">Phản hồi</th>
                            <th scope="col" class="px-4 py-3">Nội dung</th>
                            <th scope="col" class="px-4 py-3">Trạng thái</th>
                            <th scope="col" class="px-4 py-3">Ngày viết</th>
                            <th scope="col" class="px-4 py-3">Ngày sửa</th>
                            <th scope="col" class="px-4 py-3" colspan="2">
                                <span>Hành động</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $roleSA = Spatie\Permission\Models\Role::where('name', config('global.default_roles.super_admin'))->first()->name;
                        ?>
                        @foreach($comments as $comment)
                        <?php
                            $type = 'Sản phẩm';
                            $title_post = '';
                            $username = App\Models\User::find($comment->user_id)->name;
                            $reply = 0;
                            $status = true;
                            if ($comment->is_post) {
                                $type = 'Blog';
                                $temp = App\Models\Post::find($comment->type_id);
                                $title_post = $temp->title;
                            }
                            else {
                                $temp = App\Models\Product::find($comment->type_id);
                                $title_post = $temp->name;
                            }

                            if ($comment->comment_id != 0) {
                                $reply = App\Models\Comment::find($comment->comment_id)->body;
                            }

                            if ($comment->status) {
                                $status = "Hiện";
                            }
                            else {
                                $status = "Ẩn";
                            }
                            
                        ?>
                        <tr class="comment-item border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{$comment->id}}</th>
                            <td class="cmt-type px-4 py-3">{{$type}}</td>
                            <td class="cmt-title px-4 py-3">{{$title_post}}</td>
                            <td class="cmt-user px-4 py-3">
                                {{$username}}
                            </td>
                            <td class="cmt-reply px-4 py-3">
                                {{$reply}}
                            </td>
                            <td class="cmt-body px-4 py-3">
                                {{$comment->body}}
                            </td>
                            <td class="status-cmt px-4 py-3">
                                {{$status}}
                            </td>
                            <td class="px-4 py-3">
                                {{$comment->created_at}}
                            </td>
                            <td class="px-4 py-3">
                                {{$comment->updated_at}}
                            </td>
                            <td class="px-4 py-3">
                                @if ($comment->status)
                                    <a class="hide-cmt" style="cursor: pointer;" data-route="{{route('theme.hideComment',$comment->id)}}">Ẩn</a>
                                @else
                                    <a class="hide-cmt" style="cursor: pointer;" data-route="{{route('theme.hideComment',$comment->id)}}">Hiện</a>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <a class="delete-cmt" style="cursor: pointer;" data-route="{{route('theme.destroyComment',$comment->id)}}">Xóa</a>
                            </td>
                            {{-- <td class="px-4 py-3">
                                <div class="flex items-center justify-center gap-4">
                                    <svg class="fill-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="16" width="16">
                                        <path d="M367.2 412.5L99.5 144.8C77.1 176.1 64 214.5 64 256c0 106 86 192 192 192c41.5 0 79.9-13.1 111.2-35.5zm45.3-45.3C434.9 335.9 448 297.5 448 256c0-106-86-192-192-192c-41.5 0-79.9 13.1-111.2 35.5L412.5 367.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>
                                    </svg>
                                    <!-- Udpate user -->
                                    
                                    
                                    

                                    <!-- Delete user -->
                                    
                                </div>
                            </td> --}}
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                <div class="paginate-comment">
                    <div class="page-container">
                        <button class="first-page" disabled="">
                        <i class="fa fa-angle-double-left"></i>
                        </button>
                        <button class="prev-page" disabled="">
                        <i class="fa fa-angle-left"></i>
                        </button>
                        <div id="pagination"> 
                            <!-- <li class="pg-item active" data-page="1"> -->
                        </div>
                        <button class="next-page">
                            <i class="fa fa-angle-right"></i>
                        </button>
                        <button class="last-page">
                            <i class="fa fa-angle-double-right"></i>
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>


<script>
    let row = document.querySelectorAll('.comment-item');
    let rowSearch = document.querySelectorAll('.comment-item.search');
    let searchInput = document.getElementById('comment-search');

    let title = document.querySelectorAll('.cmt-title');
    let user = document.querySelectorAll('.cmt-user');
    let type = document.querySelectorAll('.cmt-type');
    let body = document.querySelectorAll('.cmt-body');
    let reply = document.querySelectorAll('.cmt-reply');
    searchInput.addEventListener('keyup', function(e) {
        e.preventDefault();
        let filter = this.value.toLowerCase();
        for(let i=0; i<row.length; i++) {
            let txtTitle = title[i].innerHTML;
            let txtType = type[i].innerHTML;
            let txtUser = user[i].innerHTML;
            let txtBody = body[i].innerHTML;
            let txtReply = reply[i].innerHTML;
            if (txtTitle.toLowerCase().indexOf(filter) > -1 
            ||txtType.toLowerCase().indexOf(filter) > -1 
            ||txtUser.toLowerCase().indexOf(filter) > -1 
            ||txtBody.toLowerCase().indexOf(filter) > -1 
            ||txtReply.toLowerCase().indexOf(filter) > -1 ) {
                row[i].classList.remove('hidden');
                row[i].classList.add('search');
            } 
            else {
                row[i].classList.add('hidden');
                row[i].classList.remove('search');
            }
            if (filter == '') {
                row[i].classList.remove('search');
            }
        }
        
        rowSearch = document.querySelectorAll('.comment-item.search');
        if (rowSearch.length != 0) {
            let countPageSearch = Math.ceil(rowSearch.length/itemPerPage);
            valuePage.totalPages = countPageSearch;
            rowSearch.forEach(function (item, i) {
                if (i>=itemPerPage) {
                    item.classList.add('hidden');
                }
            });
        }
        else{
            if (filter != '') {
                valuePage.totalPages = 0;
            }
            else{
                valuePage.totalPages = countPage;
                row.forEach(function (item, i) {
                    if (i>=itemPerPage) {
                        item.classList.add('hidden');
                    }
                });
            }
        }
        
        pagination();
        handleButtonLeft();
        handleButtonRight();

    });

    //pagination
    let itemPerPage = 20; // item per page
    let countPage = Math.ceil(row.length/itemPerPage);
    let pg = document.getElementById("pagination");
    let pages = document.getElementById("pages");
    let btnNextPg = document.querySelector("button.next-page");
    let btnPrevPg = document.querySelector("button.prev-page");
    let btnFirstPg = document.querySelector("button.first-page");
    let btnLastPg = document.querySelector("button.last-page");

    row.forEach(function (item, i) {
        if (i>=itemPerPage) {
            item.classList.add('hidden');
        }
    });

    // when page load
    // curPage.setAttribute('max', pages.value);
    let valuePage = {
        truncate: true,
        curPage: 1,
        numLinksTwoSide: 1,
        totalPages: countPage
    };
    pagination();
    pg.onclick = function(e) {
        let ele = e.target;
        if (ele.dataset.page) {
            let pageNumber = parseInt(e.target.dataset.page, 10);
            valuePage.curPage = pageNumber;


            pagination(valuePage);
            handleButtonLeft();
            handleButtonRight();
        }
    };

    document.querySelector(".page-container").onclick = function(e) {
        handleButton(e.target);
        
        let pageNumber = document.getElementsByClassName("pg-item active")[0].dataset.page;
        let temp = row;
        console.log(row.length);
        if (rowSearch.length != 0) {
            temp = rowSearch;
        }
        console.log(row.length);
        temp.forEach(function (item, i) {
            if (i>=itemPerPage*pageNumber - itemPerPage && i < itemPerPage*pageNumber) {
                item.classList.remove('hidden');
            }
            else{
                item.classList.add('hidden');
            }
        });
    };

    // DYNAMIC PAGINATION
    function pagination() {
        let _loopIt = 0;
        let totalPages = valuePage.totalPages
          , curPage = valuePage.curPage
          , truncate = valuePage.truncate
          , delta = valuePage.numLinksTwoSide;
        let range = delta + 4;
        // use for handle visible number of links left side
        let render = "";
        let renderTwoSide = "";
        let dot = "<li class=\"pg-item\"><a class=\"pg-link\">...</a></li>";
        let countTruncate = 0;
        // use for ellipsis - truncate left side or right side
        
        // use for truncate two side
        let numberTruncateLeft = curPage - delta;
        let numberTruncateRight = curPage + delta;
        let active = "";

        if (totalPages <= 1) {
            document.getElementsByClassName("paginate-comment")[0].style.display = 'none';
        } else {
            document.getElementsByClassName("paginate-comment")[0].style.display = 'flex';
        }

        for (let pos = 1; pos <= totalPages; pos++) {
            if (_loopIt++ > 10001) {
                let csb_global = typeof window === 'undefined' ? self : window;
                csb_global.infiniteLoopError = new RangeError('Potential infinite loop: exceeded ' + 10001 + ' iterations. You can disable this check by creating a sandbox.config.json file.');
                throw csb_global.infiniteLoopError;
            }
            active = pos === curPage ? "active" : "";

            // truncate
            if (totalPages >= 2 * range - 1 && truncate) {
                if (numberTruncateLeft > 3 && numberTruncateRight < totalPages - 3 + 1) {
                    // truncate 2 side
                    if (pos >= numberTruncateLeft && pos <= numberTruncateRight) {
                        renderTwoSide += renderPage(pos, active);
                    }
                } else {
                    // truncate left side or right side
                    if (curPage < range && pos <= range || curPage > totalPages - range && pos >= totalPages - range + 1 || pos === totalPages || pos === 1) {
                        render += renderPage(pos, active);
                    } else {
                        countTruncate++;
                        if (countTruncate === 1)
                            render += dot;
                    }
                }
            } else {
                // not truncate
                render += renderPage(pos, active);
            }
        }
        if (renderTwoSide) {
            renderTwoSide = renderPage(1) + dot + renderTwoSide + dot + renderPage(totalPages);
            pg.innerHTML = renderTwoSide;
        } else {
            pg.innerHTML = render;
        }
        
    }
    function renderPage(index) {
        let active = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";
        return " <li class=\"pg-item ".concat(active, "\" data-page=\"").concat(index, "\">\n        <a class=\"pg-link\" href=\"#\">").concat(index, "</a>\n    </li>");
    }
    function handleCurPage() {
        if (+curPage.value > pages.value) {
            curPage.value = 1;
            valuePage.curPage = 1;
        } else {
            valuePage.curPage = parseInt(curPage.value, 10);
        }
    }
    function handleCheckTruncate() {
        let truncate = document.querySelector("input[type=radio]:checked");
        if (truncate.id === "enable") {
            valuePage.truncate = true;
        } else {
            if (pages.value > 1000) {
                let isTruncate = confirm("Are you sure you want to render all the links? number of pages: ".concat(pages.value));
                // true => disable truncate
                if (isTruncate) {
                    valuePage.truncate = false;
                } else {
                    valuePage.truncate = true;
                    truncate.removeAttribute("checked");
                    document.getElementById("enable").checked = true;
                }
            } else {
                valuePage.truncate = false;
            }
        }
    }
    function handleButton(element) {
        if (element.classList.contains("first-page")) {
            valuePage.curPage = 1;
        } else if (element.classList.contains("last-page")) {
            valuePage.curPage = parseInt(pages.value, 10);
        } else if (element.classList.contains("prev-page")) {
            valuePage.curPage--;
            handleButtonLeft();
            btnNextPg.disabled = false;
            btnLastPg.disabled = false;
        } else if (element.classList.contains("next-page")) {
            valuePage.curPage++;
            handleButtonRight();
            btnPrevPg.disabled = false;
            btnFirstPg.disabled = false;
        }
        pagination();
    }
    function handleButtonLeft() {
        if (valuePage.curPage === 1) {
            btnPrevPg.disabled = true;
            btnFirstPg.disabled = true;
        } else {
            btnPrevPg.disabled = false;
            btnFirstPg.disabled = false;
        }
    }
    function handleButtonRight() {
        if (valuePage.curPage === valuePage.totalPages) {
            console.log(valuePage.curPage);
            btnNextPg.disabled = true;
            btnLastPg.disabled = true;
        } else {
            btnNextPg.disabled = false;
            btnLastPg.disabled = false;
        }
    }
    
    // ajax
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.each($('.hide-cmt'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                Swal.fire({
                title: "Thay đổi trạng thái bình luận?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Thay đổi",
                cancelButtonText: "Quay lại",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'PATCH',
                            url: $(this).data('route'),
                            success: function(results) {
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: "Thành công",
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                                
                                setTimeout(function(){
                                    location.reload();
                                },2000);
                            },
                            error: function(results) {
                                Swal.fire({
                                    title: results.responseText,
                                    icon: "error",
                                });
                            },
                        });
                    }
                });
            });
        });

        $('.delete-cmt').click(function(e){
            e.preventDefault();
            Swal.fire({
                title: "Bạn có chắc chắn muốn xóa ?",
                text: "Bạn sẽ không thể hoàn nguyên điều này!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Có, xóa thông tin",
                cancelButtonText: "Quay lại"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: $(this).data('route'),
                            success: function(results) {
                                Swal.fire({
                                    title: "Xóa thành công !",
                                    text: "Thông tin đã được xóa !",
                                    icon: "success",
                                    showConfirmButton: false,
                                });
                                setTimeout(function(){
                                    location.reload();
                                },2000);
                            },
                            error: function(results) {
                                Swal.fire({
                                    title: "Không thể xóa !",
                                    text: "Có diều gì đó đã xảy ra !",
                                    icon: "error"
                                });
                            },
                        });
                        
                    } 
                });
        });
    });
</script>
@endsection

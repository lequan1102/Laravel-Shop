<?php
// dashbroad
Breadcrumbs::for('dashbroad', function ($trail) {
    $trail->push(__('backend::seeders.data_label.dashboard'), route('index.dashbroad'));
});
// ***************** //
// *******Posts***** //
// ***************** //
// Bảng điều khiển > Bài viết
Breadcrumbs::for('posts', function ($trail) {
    $trail->parent('dashbroad');
    $trail->push(__('backend::seeders.data_types.post.singular'), route('index.posts'));
});
// Bảng điều khiển > Bài viết > Thêm mới
Breadcrumbs::for('posts_create', function ($trail) {
    $trail->parent('posts');
    $trail->push(__('backend::seeders.data_label.add_new'), route('create.posts'));
});
// Bảng điều khiển > Bài viết > chỉnh sửa
Breadcrumbs::for('posts_show', function ($trail) {
    $trail->parent('posts');
    $trail->push(__('backend::seeders.data_label.edit'), route('index.posts'));
});
// Bảng điều khiển > Bài viết > chỉnh sửa > [id]
Breadcrumbs::for('posts_edit', function ($trail, $edit) {
    $trail->parent('posts_show');
    $trail->push($edit->id, route('edit.posts', $edit->id));
});
// ***************** //
// *******Question***** //
// ***************** //
// Bảng điều khiển > Câu hỏi
Breadcrumbs::for('question', function ($trail) {
    $trail->parent('dashbroad');
    $trail->push(__('backend::seeders.data_types.question.singular'), route('index.question'));
});
// Bảng điều khiển > Câu hỏi > Thêm mới
Breadcrumbs::for('question_create', function ($trail) {
    $trail->parent('question');
    $trail->push(__('backend::seeders.data_label.add_new'), route('create.question'));
});
// Bảng điều khiển > Câu hỏi > chỉnh sửa
Breadcrumbs::for('question_show', function ($trail) {
    $trail->parent('question');
    $trail->push(__('backend::seeders.data_label.edit'), route('index.question'));
});
// Bảng điều khiển > Câu hỏi > chỉnh sửa > [id]
Breadcrumbs::for('question_edit', function ($trail, $edit) {
    $trail->parent('question_show');
    $trail->push($edit->id, route('edit.question', $edit->id));
});
// Bảng điều khiển > Câu hỏi > [name]
Breadcrumbs::for('question_show_name', function ($trail, $show) {
    $trail->parent('question');
    $trail->push($show->name, route('edit.question', $show->name));
});
// ***************** //
// *****Products**** //
// ***************** //
// Bảng điều khiển > Sản phẩm
Breadcrumbs::for('products', function ($trail) {
    $trail->parent('dashbroad');
    $trail->push(__('backend::seeders.data_types.product.singular'), route('index.products'));
});
// Bảng điều khiển > Đơn hàng
// Bảng điều khiển > Mã giảm giá
// Bảng điều khiển > Kho hàng
// Bảng điều khiển > Sản phẩm > [thêm mới]
Breadcrumbs::for('create_products', function ($trail) {
    $trail->parent('products');
    $trail->push(__('backend::seeders.data_label.add_new'), route('create.products'));
});
// ***************** //
// *****Category**** //
// ***************** //
// Bảng điều khiển > Chuyên mục
Breadcrumbs::for('category', function ($trail) {
    $trail->parent('dashbroad');
    $trail->push(__('backend::seeders.data_types.category.singular'), route('index.category'));
});
// Bảng điều khiển > Chuyên mục > Thêm mới
Breadcrumbs::for('category_create', function ($trail) {
    $trail->parent('category');
    $trail->push(__('backend::seeders.data_label.add_new'), route('create.category'));
});
// Bảng điều khiển > Chuyên mục > chỉnh sửa
Breadcrumbs::for('category_show', function ($trail) {
    $trail->parent('category');
    $trail->push(__('backend::seeders.data_label.edit'), route('index.category'));
});
// Bảng điều khiển > Chuyên mục > chỉnh sửa > [id]
Breadcrumbs::for('category_edit', function ($trail, $edit) {
    $trail->parent('category_show');
    $trail->push($edit->id, route('edit.category', $edit->id));
});

// Bảng điều khiển > Liên hệ
Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('dashbroad');
    $trail->push('Liên hệ', route('index.contact'));
});

// Bảng điều khiển > Người dùng > Khách hàng
Breadcrumbs::for('customer', function ($trail) {
    $trail->parent('dashbroad');
    $trail->push('Khách hàng', route('index.customer'));
});
// Bảng điều khiển > Người dùng > Quản trị
Breadcrumbs::for('administration', function ($trail) {
    $trail->parent('dashbroad');
    $trail->push('Quản trị', route('index.admin'));
});
// Bảng điều khiển > Quản trị > [Thêm mới]
Breadcrumbs::for('administration_create', function ($trail) {
    $trail->parent('administration');
    $trail->push(__('backend::seeders.data_label.add_new'), route('create.admin'));
});
// Bảng điều khiển > Cài đặt
// Breadcrumbs::for('settings', function ($trail) {
//     $trail->parent('dashbroad');
//     $trail->push('Cài đặt', route('index.settings'));
// });
// Bảng điều khiển > Cài đặt > Menus
Breadcrumbs::for('menu', function ($trail) {
    $trail->parent('dashbroad');
    $trail->push('Thực đơn', route('index.menu'));
});

// Bảng điều khiển > Cài đặt > Menus
// ***************** //
// *******Roles***** //
// ***************** //
// Bảng điều khiển > Cài đặt > Roles
Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('dashbroad');
    $trail->push(__('backend::seeders.data_types.role.singular'), route('index.roles'));
});
// Bảng điều khiển > Cài đặt > Roles > Thêm mới
Breadcrumbs::for('roles_create', function ($trail) {
    $trail->parent('roles');
    $trail->push(__('backend::seeders.data_label.add_new'), route('create.roles'));
});
// Bảng điều khiển > Chuyên mục > chỉnh sửa
Breadcrumbs::for('roles_show', function ($trail) {
    $trail->parent('roles');
    $trail->push(__('backend::seeders.data_label.edit'), route('index.roles'));
});
// Bảng điều khiển > Chuyên mục > chỉnh sửa > [id]
Breadcrumbs::for('roles_edit', function ($trail, $edit) {
    $trail->parent('roles_show');
    $trail->push($edit->id, route('edit.roles', $edit->id));
});
// ***************** //
// ****Settings***** //
// ***************** //
// Bảng điều khiển > Cài đặt > Settings
Breadcrumbs::for('settings', function ($trail) {
    $trail->parent('dashbroad');
    $trail->push('Cài đặt', route('index.settings'));
});









// Home > Blog > [Category]
// Breadcrumbs::for('category', function ($trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category->id));
// });

// Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('category', $post->category);
//     $trail->push($post->title, route('post', $post->id));
// });

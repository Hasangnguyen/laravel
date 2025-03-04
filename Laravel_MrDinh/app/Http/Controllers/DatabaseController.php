<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


class DatabaseController extends Controller
{
    public function createTables()
    {
        // Tạo bảng 'addresses'
        if (!Schema::hasTable('addresses')) {
            Schema::create('addresses', function (Blueprint $table) {
                $table->id(); // ID tự động tăng
                $table->string('street', 255)->nullable(); // Địa chỉ (có thể để trống)
                $table->string('country', 255)->collation('utf8_unicode_ci'); // Quốc gia
                $table->integer('icon_id')->nullable(); // ID icon (có thể để trống)
                $table->integer('monster_id'); // ID monster (bắt buộc)
            });
        }

        // Tạo bảng 'articles'
        if (!Schema::hasTable('articles')) {
            Schema::create('articles', function (Blueprint $table) {
                $table->id(); // ID tự động tăng
                $table->unsignedInteger('category_id'); // ID danh mục
                $table->string('title', 255)->collation('utf8_unicode_ci'); // Tiêu đề
                $table->string('slug', 255)->collation('utf8_unicode_ci')->default(''); // Slug
                $table->text('content')->collation('utf8_unicode_ci'); // Nội dung bài viết
                $table->string('image', 255)->collation('utf8_unicode_ci')->nullable(); // Ảnh đại diện
                $table->enum('status', ['PUBLISHED', 'DRAFT'])->default('PUBLISHED'); // Trạng thái bài viết
                $table->date('date'); // Ngày xuất bản
                $table->boolean('featured')->default(false); // Bài viết nổi bật (0 = không, 1 = có)
                $table->timestamps(); // `created_at` và `updated_at`
                $table->softDeletes(); // `deleted_at`
            });
            
        }

        if (!Schema::hasTable('article_tag')) {
            Schema::create('article_tag', function (Blueprint $table) {
                $table->id(); // ID tự động tăng
                $table->unsignedInteger('article_id'); // ID bài viết
                $table->unsignedInteger('tag_id'); // ID thẻ
                $table->timestamps(); // created_at, updated_at
                $table->softDeletes(); // deleted_at
            });
        }

        // Tạo bảng 'a_s'
        if (!Schema::hasTable('a_s')) {
            Schema::create('a_s', function (Blueprint $table) {
                $table->id(); // ID tự động tăng
                $table->unsignedInteger('b_s_id'); // ID liên kết với bảng khác
            });
        }

        if (!Schema::hasTable('bills')) {
            Schema::create('bills', function (Blueprint $table) {
                $table->id(); // ID tự động tăng
                $table->unsignedInteger('id_customer')->nullable(); // ID khách hàng
                $table->date('date_order')->nullable(); // Ngày đặt hàng
                $table->float('total')->nullable()->comment('Tổng tiền'); // Tổng tiền
                $table->string('payment', 200)->nullable()->comment('Hình thức thanh toán'); // Thanh toán
                $table->string('note', 500)->nullable(); // Ghi chú
                $table->timestamps(); // created_at & updated_at
            });
        }

        // 1. Tạo bảng bill_detail
        if (!Schema::hasTable('bill_detail')) {
            Schema::create('bill_detail', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('id_bill');
                $table->unsignedInteger('id_product');
                $table->integer('quantity')->comment('số lượng');
                $table->double('unit_price');
                $table->timestamps();
            });
        }

        // 2. Tạo bảng b_s
        if (!Schema::hasTable('b_s')) {
            Schema::create('b_s', function (Blueprint $table) {
                $table->id();
                $table->string('data', 255);
            });
        }

        // 3. Tạo bảng categories
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->integer('parent_id')->default(0);
                $table->integer('lft')->nullable();
                $table->integer('rgt')->nullable();
                $table->integer('depth')->nullable();
                $table->string('name');
                $table->string('slug');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 4. Tạo bảng comments
        if (!Schema::hasTable('comments')) {
            Schema::create('comments', function (Blueprint $table) {
                $table->id();
                $table->string('username');
                $table->text('comment');
                $table->unsignedInteger('id_product');
                $table->timestamps();
            });
        }

        // 5. Tạo bảng customer
        if (!Schema::hasTable('customer')) {
            Schema::create('customer', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->string('gender', 10);
                $table->string('email', 50);
                $table->string('address', 100);
                $table->string('phone_number', 20);
                $table->string('note', 200);
                $table->timestamps();
            });
        }

        // 6. Tạo bảng dummies
        if (!Schema::hasTable('dummies')) {
            Schema::create('dummies', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description');
                $table->json('extras'); // Sử dụng kiểu JSON thay vì longtext
                $table->timestamps();
            });
        }

        // 7. Tạo bảng failed_jobs
        if (!Schema::hasTable('failed_jobs')) {
            Schema::create('failed_jobs', function (Blueprint $table) {
                $table->id();
                $table->text('connection');
                $table->text('queue');
                $table->longText('payload');
                $table->longText('exception');
                $table->timestamp('failed_at')->useCurrent();
            });
        }

        // 8. Tạo bảng icons
        if (!Schema::hasTable('icons')) {
            Schema::create('icons', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('icon');
                $table->timestamps();
            });
        }

        // 9. Tạo bảng menu_items
        if (!Schema::hasTable('menu_items')) {
            Schema::create('menu_items', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->string('type', 20)->nullable();
                $table->string('link', 255)->nullable();
                $table->unsignedInteger('page_id')->nullable();
                $table->unsignedInteger('parent_id')->nullable();
                $table->integer('lft')->nullable();
                $table->integer('rgt')->nullable();
                $table->integer('depth')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

          // Tạo bảng model_has_permissions
          if (!Schema::hasTable('model_has_permissions')) {
            Schema::create('model_has_permissions', function (Blueprint $table) {
                $table->unsignedInteger('permission_id');
                $table->string('model_type', 255);
                $table->unsignedBigInteger('model_id');
            });
        }

        // Tạo bảng model_has_roles
        if (!Schema::hasTable('model_has_roles')) {
            Schema::create('model_has_roles', function (Blueprint $table) {
                $table->unsignedInteger('role_id');
                $table->string('model_type', 255);
                $table->unsignedBigInteger('model_id');
            });
        }

        // Tạo bảng monsters
        if (!Schema::hasTable('monsters')) {
            Schema::create('monsters', function (Blueprint $table) {
                $table->id();
                $table->string('address', 255)->nullable();
                $table->string('browse', 255)->nullable();
                $table->boolean('checkbox')->nullable();
                $table->text('wysiwyg')->nullable();
                $table->string('color', 255)->nullable();
                $table->string('color_picker', 255)->nullable();
                $table->date('date')->nullable();
                $table->date('date_picker')->nullable();
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->dateTime('datetime')->nullable();
                $table->dateTime('datetime_picker')->nullable();
                $table->string('email', 255)->nullable();
                $table->integer('hidden')->nullable();
                $table->string('icon_picker', 255)->nullable();
                $table->string('image', 255)->nullable();
                $table->string('month', 255)->nullable();
                $table->integer('number')->nullable();
                $table->double('float', 8, 2)->nullable();
                $table->string('password', 255)->nullable();
                $table->string('radio', 255)->nullable();
                $table->string('range', 255)->nullable();
                $table->integer('select')->nullable();
                $table->string('select_from_array', 255)->nullable();
                $table->integer('select2')->nullable();
                $table->string('select2_from_ajax', 255)->nullable();
                $table->string('select2_from_array', 255)->nullable();
                $table->text('simplemde')->nullable();
                $table->text('summernote')->nullable();
                $table->text('table')->nullable();
                $table->text('textarea')->nullable();
                $table->string('text', 255);
                $table->text('tinymce')->nullable();
                $table->string('upload', 255)->nullable();
                $table->string('upload_multiple', 255)->nullable();
                $table->string('url', 255)->nullable();
                $table->text('video')->nullable();
                $table->string('week', 255)->nullable();
                $table->text('extras')->nullable();
                $table->timestamps(); // created_at và updated_at
                $table->mediumBinary('base64_image')->nullable();
            });
        }

        // Tạo bảng monster_article
        if (!Schema::hasTable('monster_article')) {
            Schema::create('monster_article', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('monster_id');
                $table->unsignedInteger('article_id');
                $table->timestamps(); // created_at và updated_at
                $table->timestamp('deleted_at')->nullable(); // deleted_at
            });
        }

        // Tạo bảng monster_category
        if (!Schema::hasTable('monster_category')) {
            Schema::create('monster_category', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('monster_id');
                $table->unsignedInteger('category_id');
                $table->timestamps(); // created_at và updated_at
                $table->timestamp('deleted_at')->nullable(); // deleted_at
            });
        }

        // Tạo bảng monster_tag
        if (!Schema::hasTable('monster_tag')) {
            Schema::create('monster_tag', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('monster_id');
                $table->unsignedInteger('tag_id');
                $table->timestamps(); // created_at và updated_at
                $table->timestamp('deleted_at')->nullable(); // deleted_at
            });
        }

        // Tạo bảng news
        if (!Schema::hasTable('news')) {
            Schema::create('news', function (Blueprint $table) {
                $table->id();
                $table->string('title', 200);
                $table->text('content');
                $table->string('image', 100);
                $table->timestamps(); // created_at và updated_at
            });
        }

        // Tạo bảng pages
        if (!Schema::hasTable('pages')) {
            Schema::create('pages', function (Blueprint $table) {
                $table->id();
                $table->string('template', 255);
                $table->string('name', 255);
                $table->string('title', 255);
                $table->string('slug', 255);
                $table->text('content')->nullable();
                $table->text('extras')->nullable();
                $table->timestamps(); // created_at và updated_at
                $table->timestamp('deleted_at')->nullable(); // deleted_at
            });
        }

        // Tạo bảng password_resets
        if (!Schema::hasTable('password_resets')) {
            Schema::create('password_resets', function (Blueprint $table) {
                $table->string('email', 255);
                $table->string('token', 255);
                $table->timestamp('created_at')->nullable();
            });
        }

        // Tạo bảng permissions
        if (!Schema::hasTable('permissions')) {
            Schema::create('permissions', function (Blueprint $table) {
                $table->id();
                $table->string('name', 255);
                $table->string('guard_name', 255);
                $table->timestamps(); // created_at và updated_at
            });
        }

        // Tạo bảng postalboxes
        if (!Schema::hasTable('postalboxes')) {
            Schema::create('postalboxes', function (Blueprint $table) {
                $table->id();
                $table->string('postal_name', 255)->nullable();
                $table->integer('monster_id');
            });
        }

        // Tạo bảng products
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100)->nullable();
                $table->unsignedInteger('id_type')->nullable();
                $table->text('description')->nullable();
                $table->float('unit_price')->nullable();
                $table->float('promotion_price')->nullable();
                $table->string('image', 255)->nullable();
                $table->string('unit', 255)->nullable();
                $table->tinyInteger('new')->default(0);
                $table->timestamps(); // created_at và updated_at
            });
        }

        // Tạo bảng revisions
        if (!Schema::hasTable('revisions')) {
            Schema::create('revisions', function (Blueprint $table) {
                $table->id();
                $table->string('revisionable_type', 255);
                $table->integer('revisionable_id');
                $table->integer('user_id')->nullable();
                $table->string('key', 255);
                $table->text('old_value')->nullable();
                $table->text('new_value')->nullable();
                $table->timestamps(); // created_at và updated_at
            });
        }

        // Tạo bảng roles
        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('name', 255);
                $table->string('guard_name', 255);
                $table->timestamps(); // created_at và updated_at
            });
        }

        // Tạo bảng role_has_permissions
        if (!Schema::hasTable('role_has_permissions')) {
            Schema::create('role_has_permissions', function (Blueprint $table) {
                $table->unsignedInteger('permission_id');
                $table->unsignedInteger('role_id');
            });
        }

        // Tạo bảng settings
        if (!Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->id();
                $table->string('key', 255);
                $table->string('name', 255);
                $table->string('description', 255)->nullable();
                $table->string('value', 255)->nullable();
                $table->text('field');
                $table->tinyInteger('active');
                $table->timestamps(); // created_at và updated_at
            });
        }

        // Tạo bảng slide
        if (!Schema::hasTable('slide')) {
            Schema::create('slide', function (Blueprint $table) {
                $table->id();
                $table->string('link', 100);
                $table->string('image', 100);
            });
        }

        if (!Schema::hasTable('tags')) {
            Schema::create('tags', function (Blueprint $table) {
                $table->id();
                $table->string('name', 255)->collation('utf8_unicode_ci');
                $table->string('slug', 255)->collation('utf8_unicode_ci');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (!Schema::hasTable('type_products')) {
            Schema::create('type_products', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100)->collation('utf8_unicode_ci');
                $table->text('description')->collation('utf8_unicode_ci');
                $table->string('image', 255)->collation('utf8_unicode_ci');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('migrations')) {
            Schema::create('migrations', function (Blueprint $table) {
                $table->id();
                $table->string('migration', 191)->collation('utf8mb4_unicode_ci');
                $table->integer('batch');
            });
        }

        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name', 255)->collation('utf8_unicode_ci');
                $table->string('email', 255)->unique()->collation('utf8_unicode_ci');
                $table->string('password', 255)->collation('utf8_unicode_ci');
                $table->rememberToken();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('wishlists')) {
            Schema::create('wishlists', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_user');
                $table->unsignedBigInteger('id_product');
                $table->integer('quantity')->default(1);
                $table->timestamps();

                $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            });
        }

        if (!Schema::hasTable('addresses')) {
            Schema::create('addresses', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('monster_id')->unique();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('articles')) {
            Schema::create('articles', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }
        
        if (!Schema::hasTable('bills')) {
            Schema::create('bills', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_customer');
                $table->timestamps();
                $table->foreign('id_customer')->references('id')->on('customer');
            });
        }

        return response()->json(['message' => 'Các bảng đã được tạo thành công!']);
    }
}

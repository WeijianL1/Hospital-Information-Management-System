[TOC]

------

Note: this was originally a Chinese version IMS. It might still take sometimes for me to translate the whole thing and simplifiy the back end database. 

------

#To-dos
* Translation
* MySQL databese redesign

------



# 参考资料

* laravel博客搭建教程：http://www.golaravel.com/post/2016-ban-laravel-xi-lie-ru-men-jiao-cheng-yi/
* laravel Eloquent ORM详解（用于数据库查询操作）：https://lvwenhan.com/laravel/421.html
* laravel中文文档（墙裂推荐）：http://laravelacademy.org/laravel-docs-5_2
  * 我觉得值得着重看的部分：
    * 路由
    * RESTful 资源控制器
    * Blade模板引擎：可以辅助写html界面
    * 整个『基础』部分😂
    * 查询构建器&Eloquent ORM：用于执行数据库查询

------

# 新建一个功能或录入界面的步骤：

* 概念：

  * MVC: 我理解的M就是核心，储存着数据信息，在laravel里也是通过Model来和数据库互动；V是视图，只负责页面显示的样式；C负责控制，或者说负责有哪些数据要传送到V上。
  * 在Laravel里，基本数据库中每张表格都要对应一个Model和一个Controller，这样每张表格都可以通过laravel的RESTful实现新增，删除，和编辑。

* 新加入一个录入界面的步骤（以病人基本信息为例）：

  1. 新建一个Model

     >```php 
     >php artisan make:model Bingren
     >```

  2. 新建一个Controller

     > ```php
     > php artisan make:controller Admin/BingrenController
     > ```

     这个Controller包含所要用得到函数，基本就是『index, show, create, edit, update, store, destroy』等，这些函数一般直接指向某个视图，或者执行某些储存动作

  3. 注册Http路由：当服务器收到某些url请求时，会执行哪些Controller中对应的函数。一般只用RESTful就够了。就像这样：

     > ```php
     > Route::resource('bingren','BingrenController');
     > ```

  4. 编写视图（一律存放在resources/views目录下）

------

# 关于添加入院记录

* 方式1：添加病人基本信息之后，点击『保存,继续添加入院记录。之后laravel会调用
  RuyuanjiluController里的edit函数，因为只有edit函数可以传递id的值。之后edit会调用
  create_id视图。这种方法调用的添加页面会在header里标明病人的姓名和住院号
* 方式2：直接在左侧导航栏选择『添加入院记录』。与方法1不同，laravel会直接调用
  RuyaunjiluController里的create和store函数，因为这种方法需要用户手动填写id的值，
  所以并不需要在url中传递id值
#### 注：关于RuyaunjiluController中的edit函数
因为我提供了两种添加入院记录的方式，而这两种方式都会调用edit函数，所以edit函数会自动判断数据库中是否已经存在了传入id值的入院记录，如果存在，就调用edit编辑视图，如果不存在，就调用create_id新建一条记录。

------

# 代码说明

## Model

* 位置：app文件夹下。目前包含：Bingren.php，Ruyuanjilu.php和User.php
* 通过php artisan make:model + model名字 生成。
* 自动继承Model类，母级Model类位于vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model。Model文件内有很多设置，比如添加新的记录时，默认会生成两个时间戳字段，create_at和update_at，表明新建或更新数据的时间，可以通过修改Model内的变量值关闭时间戳。（不过一般修改的时候都会在子类中，比如BingrenController中重写Model中的设置）。具体可以参考：http://laravelacademy.org/post/2995.html
* 可以自定义一对一，一对多，多对多关联。比如我的Ruyuanjilu这个model里边就自己写了一个函数，是一个一对一关系。 不过没有用到这个函数。 参考：https://lvwenhan.com/laravel/421.html
* 写到一半突然领悟到了一个概念😂，关于Eloquent ORM，翻译过来是对象关系映射。其实就是每一个model对应一张表格，可以理解成把这张表转化成一个Model对象，这个对象的属性就对应着表格中的字段。比如Bingrens::where('id','=','10')，Bingrens就是bingrens表格在Model中的映射，所以要获取bingrens中的值，只对Bingrens操作就好了。同理，所有其它针对Bingrens的操作都会映射到真正的表格中。Model就是这样通过Eloquent ORM和数据库交互的。

## Controller

* 位置：app/Http/Controllers。

* 通过 php artisan make:controller 控制器名称 生成

* Controller.php是Laravel的Controller母类。HomeController是Laravel预设的控制主页的Controller。Auth文件夹下是Laravel预设的负责登录验证的Controller。Admin下是我自己写的两个Controller，分别负责病人基本信息和入院记录的操作。

* 自动继承Controller类。主要功能是收到路由请求后，决定执行什么操作。Controller中的各种函数就是这些操作。主要有两类

  * 直接调用Controller类的view()函数，跳转到某个视图上
  * 像update和store这种，与Model进行互动，再由Model操作数据库

* 比较重要的一点是如何在Controller和View之间传递数据，比如

  > ```php
  > return view('admin/bingren/show')->withBingren(Bingren::find($id));
  > ```

  这里的『withBingren(Bingren::find($id))』就是用来传递值的，还有其他的方法，具体请参考：http://www.golaravel.com/laravel/docs/5.0/views/

## View

* 位置：resources/views
* 所有的视图都是.blade.php后缀的，代表他用了blade模板。blade模板我感觉是管理网页模块用的，参考：http://laravelacademy.org/post/2865.html
* admin文件夹下的所有文件都是新创建的，以bingren文件夹中的文件为例：
  * create.blade.php为新建病人信息视图
  * edit.blade.php为编辑信息视图
  * index.blade.php为信息管理视图
  * show.blade.php为详情页视图
  * 注：ruyuanjilu中的create_id用于在页面顶部显示病人的id和姓名，show_noId用于当检测到某个病人没有入院记录时，引导用户添加入院记录。
* auth文件夹下的文件都是laravel预设的。我修改了两个东西：1. 把英文界面翻译成了中文的； 2. 原来的登录需要填写email地址，我改成了需要填写数据库中users表格中的name字段。
* layouts：
  * 最母级的视图是 resources/views/layouts/app.blade.php，该视图包含所有页面都会出现的元素，即顶部的logo和导航栏。左侧的下拉导航栏位置在resources/views/layouts/dropdown.blade.php，该视图继承app.blade.php，只在登陆之后出现。登录视图位置是 resources/views/auth，因为登录界面不需要下拉导航栏，所以auth下的所有视图都直接继承app.blade.php。所有功能视图都在resources/views/admin里边，他们都继承dropdown.blade.php，这样所有功能界面里都有下拉导航栏了。
* welcome.blade.php会显示出一些备忘录，待实现的功能。对应url是"/"，即url为localhost:1024/的时候会调用welcome 视图。url可以在路由中设置
* home.blade.php会显示出欢迎界面。对应url是/home，可以再路由中设置。
* 其他细节我都在代码中注释出来了

## 路由

* 位置：/app/Http/routes
* 路由负责监听url请求，并根据不同url调用不同的Controller或者视图

------

# 多语言支持

​	Laravel 5.2支持多语言，语言文件位置是 resources/lang/. 这部分很细枝末节了，之前我翻译了一部分代码，比如现在输错密码之后会显示中文的『密码/用户名不匹配』等等，以前默认是英文的。具体的语言文件编写可以参考：	http://laravelacademy.org/post/1947.html 貌似网上还有语言包下载。

------

# 本地样式文件&本地资源

​	如果想把css，js等样式文件都放在本地，然后在html的<head>部分直接引用本的文件可以提高网页加载速度。这些样式文件我都放在了public里边，更严格的做法好像是用Laravel自带的Elixir管理器，然而我并没有搞懂😂

------

# 常见错误

* NotFoundHttpException: 没有注册路由

* ……Not Found：需要在代码顶端写明命名空间，如 use App\Bingren

* Reflection Exception: Controller没有建立或者Controller中的某个函数出了问题

* TokenMismatchException: 没有添加csrf验证，在表单<form>之后加上

  > {!! csrf_field()!!}

  就好了

* 有时候会出现一种错误，名字是一长串数字和字母的php文件，他会写是第几行出了问题，一般就是视图文件中的语法错误导致的

------

# 待解决的问题

* 入院记录的编辑视图：因为入院记录很多都是复选框和单选框，在编辑的时候需要读取数据库已有信息，然后判断哪个框是选中的，那个是没选中的。我的设想是写一个js函数，用document.getElementById.check=true/false来改变选择框的状态。然而目前并没有成功。主要是多选比较难处理，难点在于，数据库中多选相应字段下储存的是一串Stirng，比如『慢性病，结核，肿瘤，』，怎么让js检测到有哪些字符，该勾选哪些选项，比较伤脑筋。

* 入院记录『慢性病』一栏，需求中写的是慢性病还要多出来几个子选项，这个我也没想好怎么往数据库里储存，所以还没写

* 现在我的html页面排版有点简陋😂，空隙都是用『&nbsp』来代替的。这种方法有可能到了不同大小的屏幕上就乱了。。。

  ​


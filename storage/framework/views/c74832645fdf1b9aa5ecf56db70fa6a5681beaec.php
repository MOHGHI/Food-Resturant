<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('class'); ?>
    <?php echo e($class); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <main class="page-content py-5">

        <header class="page-header mt-4 text-center">
            <h1 class="page-title h2 font-body-bold">حساب جديد</h1>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-10 col-12 mx-auto font-body-bold mb-5">

                    <div class="d-flex px-3 rounded-lg shadow-around mt-4 justify-content-between flex-md-column flex-sm-column flex-column bg-white">
                        <ul class="nav nav-tabs border-0 px-lg-2 pr-0 text-center justify-content-around"
                            id="new-branch-tabs"
                            role="tablist">

                            <li class="nav-item">
                                <a class="nav-link pb-3 h3 mb-0 pt-3 font-body-bold active"
                                   id="user-tab"
                                   data-toggle="tab"
                                   href="#user"
                                   role="tab"
                                   aria-controls="user"
                                   aria-selected="true">
                                    كمستخدم
                                </a>
                            </li><!-- .nav-item -->

                            <li class="nav-item">
                                <a class="nav-link pb-3 h3 mb-0 pt-3 font-body-bold"
                                   id="restaurant-tab"
                                   data-toggle="tab"
                                   href="#restaurant"
                                   role="tab"
                                   aria-controls="restaurant"
                                   aria-selected="false">
                                    كمطعم
                                </a>
                            </li><!-- .nav-item -->
                        </ul><!-- .nav-tabs -->
                    </div>


                    <div class="tab-content">

                        <div class="tab-pane fade show active"
                             id="user"
                             role="tabpanel"
                             aria-describedby="user-tab">

                            <form action="<?php echo e(url("/user/register")); ?>" method="POST" class="register-form mt-5">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label for="user-name">الاسم كامل</label>
                                    <input type="text"
                                           class="form-control border-gray font-body-md"
                                           name="user-name"
                                           value="<?php echo e(old("user-name")); ?>"
                                           id="user-name" required>
                                    <?php if($errors->has("user-name")): ?>
                                        <div class="alert alert-danger top-margin">
                                            <?php echo e($errors->first("user-name")); ?>

                                        </div>
                                    <?php endif; ?>
                                </div><!-- .form-group name -->

                                <div class="form-group">
                                    <label for="country">الدولة</label>
                                    <select class="country-ajax-request custom-select text-gray font-body-md" data-action="<?php echo e(url("/restaurant/cities")); ?>" name="user-country" id="user-country" required>
                                        <option value="">يرجى تحديد الدولة</option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($c->id); ?>" <?php if(old('user-country') == $c->id): ?> selected <?php endif; ?>><?php echo e($c->ar_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                    <?php if($errors->has("user-country")): ?>
                                        <div class="alert alert-danger top-margin">
                                            <?php echo e($errors->first("user-country")); ?>

                                        </div>
                                    <?php endif; ?>
                                    
                                </div><!-- .form-group country -->


                                <div class="form-group">
                                    <label for="city">المدينة</label>
                                    <select class="city-ajax-request custom-select text-gray font-body-md" id="user-city" name="user-city" required>
                                        <?php if(old("user-country")): ?>
                                            <option value="">برجاء اختيار المدينة</option>
                                            <?php $__currentLoopData = \App\Http\Controllers\User\HelperController::get_cities(old("user-country")); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($city->id); ?>" <?php if(old('user-city') == $city->id): ?> selected <?php endif; ?>><?php echo e($city->ar_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <option value="">برجاء تحديد الدولة اولا</option>
                                        <?php endif; ?>

                                    </select>
                                    
                                    <?php if($errors->has("user-city")): ?>
                                        <div class="alert alert-danger top-margin">
                                            <?php echo e($errors->first("user-city")); ?>

                                        </div>
                                    <?php endif; ?>
                                    
                                </div><!-- .form-group city -->

                                <div class="form-group">
                                    <label for="user-sax">الجنس</label>
                                    <select class="custom-select text-gray font-body-md" name="user-gender" id="user-sax" required>
                                        <option value="">يرجى تحديد الجنس</option>
                                        <option value="1" <?php if(old('user-gender') == 1): ?> selected <?php endif; ?>>ذكر</option>
                                        <option value="2" <?php if(old('user-gender') == 2): ?> selected <?php endif; ?>>أنثى</option>
                                    </select>
                                    
                                    <?php if($errors->has("user-gender")): ?>
                                        <div class="alert alert-danger top-margin">
                                            <?php echo e($errors->first("user-gender")); ?>

                                        </div>
                                    <?php endif; ?>
                                    
                                </div><!-- .form-group service provider -->



                                <div class="form-group">
                                    <label for="phone-number">تاريخ الميلاد</label>
                                    <input type="date" class="form-control border-gray font-body-md" value="<?php echo e(old('user-age')); ?>" id="user-age" name="user-age" required>
                                    <?php if($errors->has("user-age")): ?>
                                        <div class="alert alert-danger top-margin">
                                            <?php echo e($errors->first("user-age")); ?>

                                        </div>
                                    <?php endif; ?>
                                </div><!-- .form-group phone -->

                                <div class="form-group">
                                    <label for="phone-number">رقم الهاتف</label>
                                    <input type="tel" class="form-control border-gray font-body-md" value="<?php echo e(old('user-phone')); ?>" name="user-phone" id="user-phone-number" placeholder="05xxxxxxxx" required>
                                    
                                    <?php if($errors->has("user-phone")): ?>
                                        <div class="alert alert-danger top-margin">
                                            <?php echo e($errors->first("user-phone")); ?>

                                        </div>
                                    <?php endif; ?>
                                    
                                </div><!-- .form-group phone -->

                                <div class="form-group">
                                    <label for="email">البريد الإلكتروني</label>
                                    <input type="email"
                                           class="form-control border-gray font-body-md"
                                           id="user-email" required
                                           value="<?php echo e(old('user-email')); ?>"
                                           name="user-email">
                                    
                                    <?php if($errors->has("user-email")): ?>
                                        <div class="alert alert-danger top-margin">
                                            <?php echo e($errors->first("user-email")); ?>

                                        </div>
                                    <?php endif; ?>
                                </div><!-- .form-group email -->

                                <div class="form-group">
                                    <label for="password">كلمة المرور</label>
                                    <input type="password"
                                           class="form-control border-gray font-body-md"
                                           minlength= 6
                                           id="user-password" required
                                           name="user-password">

                                    <?php if($errors->has("user-password")): ?>
                                        <div class="alert alert-danger top-margin">
                                            <?php echo e($errors->first("user-password")); ?>

                                        </div>
                                    <?php endif; ?>
                                </div><!-- .form-group password -->


                                <div class="form-group">
                                    <div class="custom-control custom-checkbox pl-0 pr-4 text-gray">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               name="usage"
                                               id="customCheck6" required>
                                        <label class="custom-control-label font-body-md"
                                               for="customCheck6">
                                            أنت توافق على <a href="<?php echo e(url("/page/1")); ?>" class="no-decoration text-primary">اتفاقية الإستخدام</a>
                                        </label>
                                        <?php if($errors->has("usage")): ?>
                                            <div class="alert alert-danger top-margin">
                                                <?php echo e($errors->first("usage")); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div><!-- .custom-control -->
                                </div><!-- .form-group agreement -->

                                <button type="submit" class="btn btn-primary py-2 px-5">التسجيل</button>
                            </form><!-- .register-form -->

                        </div><!-- .tab-pane -->



                        <div class="tab-pane fade"
                             id="restaurant"
                             role="tabpanel"
                             aria-labelledby="restaurant-tab">


                            <form id="provider-register-form" class="register-form mt-4" data-action="<?php echo e(url("/restaurant/register")); ?>">

                                <div class="form-group">
                                    <p>شعار المطعم</p>
                                    <div class="custom-file h-auto">
                                        <input type="file" name="image" class="custom-file-input" id="restaurant-logo" hidden>
                                        <label class="border-0 mb-0 cursor" for="restaurant-logo">
                                            <img class="provider-uploaded-logo hidden-element" src="" />
                                            <span id="provider-logo-content" class="d-inline-block border border-gray rounded-circle p-4">

                                                <i class="fa fa-plus fa-fw fa-lg text-gray" aria-hidden="true"></i>

                                            </span>

                                            <span class="font-body-md mr-2 text-gray">
                                        قم بإضافة شعار المطعم
                                            </span>
                                            <p id="provider-logo-error" class="alert alert-danger hidden-element top-margin logo-error">شعار المطعم مطلوب</p>
                                        </label>
                                    </div>
                                </div><!-- .form-group logo -->

                                <div class="form-group">
                                    <label for="restaurant-ar-name">إسم المطعم باللغة العربية</label>
                                    <input type="text"
                                           class="form-control border-gray font-body-md"
                                           name="restaurant-ar-name"
                                           id="restaurant-ar-name" >
                                           
                                           <span id="restaurant-ar-name_error" style="color:red" class="help-block"></span>
                                </div><!-- .form-group ar name -->

                                <div class="form-group">
                                    <label for="restaurant-en-name">إسم المطعم باللغة الانجليزية</label>
                                    <input type="text"
                                           class="form-control border-gray font-body-md"
                                           name="restaurant-en-name"
                                           id="restaurant-en-name" required>
                                           
                                           <span id="restaurant-en-name_error" style="color:red" class="help-block"></span>
                                </div><!-- .form-group en name -->

                                <div class="form-group">
                                    <label for="service-provider">نوع مقدم الخدمة</label>
                                    <select class="custom-select text-gray font-body-md" name="service-provider" id="service-provider">
                                        <option value="">يرجى تحديد نوع مقدم الخدمة</option>
                                        <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->ar_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                     <span id="service-provider_error" style="color:red" class="help-block"></span>
                                     
                                </div><!-- .form-group service provider -->

                                <div class="form-group">
                                    <p>الخدمات المطلوبة</p>
                                    <div class="row pr-4 text-gray font-body-md">

                                        <div class="custom-control custom-checkbox pl-0 col-md-6 col-12 mb-2">
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   name="automatic-list"
                                                   id="automatic-list">
                                            <label class="custom-control-label font-body-md"
                                                   for="automatic-list">قائمة الكترونية</label>
                                        </div><!-- .custom-control -->

                                        <div class="custom-control custom-checkbox pl-0 col-md-6 col-12">
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   name="accept-online-payment"
                                                   id="accept-online-payment">
                                            <label class="custom-control-label font-body-md"
                                                   for="accept-online-payment">قبول الدفع الالكتروني</label>
                                        </div><!-- .custom-control -->
                                        
                                        <div class="custom-control custom-checkbox pl-0 col-md-6 col-12">
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   name="accept-order"
                                                   id="accept-order">
                                            <label class="custom-control-label font-body-md"
                                                   for="accept-order">قبول الطلبات</label>
                                        </div><!-- .custom-control -->

                                    </div>
                                </div><!-- .form-group service -->

                                <div class="form-group">
                                    <label for="country">الدولة</label>
                                    <select class="country-ajax-request custom-select text-gray font-body-md" data-action="<?php echo e(url("/restaurant/cities")); ?>" name="country" id="country" required>
                                        <option value="">يرجى تحديد الدولة</option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($c->id); ?>"><?php echo e($c->ar_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                    <span id="country_error" style="color:red" class="help-block"></span>
                                </div><!-- .form-group country -->

                                <div class="form-group">
                                    <label for="city">المدينة</label>
                                    <select class="city-ajax-request custom-select text-gray font-body-md" name="city" id="city" required>
                                        <option value="">برجاء تحديد الدولة اولا</option>
                                    </select>
                                    <span id="city_error" style="color:red" class="help-block"></span>
                                </div><!-- .form-group city -->

                                <div class="form-group">
                                    <label for="phone-number">رقم التواصل</label>
                                    <input type="text" class="form-control border-gray font-body-md" name="phone-number" id="phone-number" placeholder="05XXXXXXXX" required>
                                    <div id="phone-error" class="top-margin alert alert-danger hidden-element"></div>
                                    
                                    <span id="phone-number_error" style="color:red" class="help-block"></span>
                                    
                                </div><!-- .form-group phone -->

                                <div class="form-group">
                                    <label for="email">البريد الإلكتروني</label>
                                    <input type="email"
                                           class="form-control border-gray font-body-md"
                                           name="email"
                                           id="email" required>
                                    <div id="email-error" class="top-margin alert alert-danger hidden-element"></div>
                                    
                                    <span id="email_error" style="color:red" class="help-block"></span>
                                    
                                </div><!-- .form-group email -->

                                <div class="form-group">
                                    <label for="password">كلمة المرور</label>
                                    <input type="password"
                                           class="form-control border-gray font-body-md"
                                           minlength= 6
                                           name="password"
                                           id="password" required>
                                           
                                           <span id="password_error" style="color:red" class="help-block"></span>
                                           
                                </div><!-- .form-group password -->

                                <div class="form-group">
                                    <label for="provider-ar-details">نبذة عن الخدمة المقدمة باللغة العربية</label>
                                    <textarea class="form-control font-body-md"
                                              id="provider-ar-details"
                                              name="provider-ar-details"
                                              rows="6" required></textarea>
                                              <span id="provider-ar-details_error" style="color:red" class="help-block"></span>
                                </div><!-- .form-group ar details -->

                                <div class="form-group">
                                    <label for="provider-en-details">نبذة عن الخدمة المقدمة باللغة الانجليزية</label>
                                    <textarea class="form-control font-body-md"
                                              id="provider-en-details"
                                              name="provider-en-details"
                                              rows="6" required></textarea>
                                              
                                               <span id="provider-en-details_error" style="color:red" class="help-block"></span>
                                </div><!-- .form-group en details -->

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox pl-0 pr-4 text-gray">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               name="custom-control-input"
                                               name="accept-policy"
                                               id="accept-policy" required>
                                        <label class="custom-control-label font-body-md"
                                               for="accept-policy">
                                            أنت توافق على <a href="<?php echo e(url("/page/1")); ?>" class="no-decoration text-primary">اتفاقية الإستخدام</a>
                                        </label>
                                    </div><!-- .custom-control -->
                                </div><!-- .form-group agreement -->

                                <button type="submit" class="btn btn-primary py-2 px-5">التسجيل</button>
                            </form><!-- .register-form -->
                        </div>
                    </div>


                </div><!-- .col-* -->
            </div><!-- .row -->
        </div><!-- .container -->
    </main><!-- .page-content -->



<?php $__env->stopSection(); ?>
<?php echo $__env->make('Site.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
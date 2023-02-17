<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', config('app.name', 'E-Shop')); ?></title>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/svg+xml" href="<?php echo e(asset('favicon.svg')); ?>">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    
    
    
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0/dist/themes/light.css"/>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.0.0/dist/shoelace.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.50.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
        module.exports = {
            plugins: [require("@tailwindcss/typography"), require("daisyui")],
            daisyui: {
                styled: true,
                themes: true,
                base: true,
                utils: true,
                logs: true,
                rtl: false,
                prefix: "",
                darkTheme: "dark",
            },
        }
    </script>
    <link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>" />
    <script type="module" src="<?php echo e(asset('/js/mano.js')); ?>"></script>
</head>
<body>

<div class="main_grid">
    <?php echo $__env->make('layouts.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="message hidden"><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content', 'Default content'); ?>
    </div>
    <br>
    <?php echo $__env->make('layouts.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<script src="<?php echo e(asset('/js/mano.js')); ?>"></script>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/admin/main.blade.php ENDPATH**/ ?>
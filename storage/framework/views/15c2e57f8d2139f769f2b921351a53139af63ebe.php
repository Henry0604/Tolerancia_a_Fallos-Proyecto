

<?php $__env->startSection('titulo'); ?>
    Página Principal
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

    <?php if($posts->count()): ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <a href="<?php echo e(route('posts.show', ['post' => $post, 'user' => $post->user ])); ?>">
                        <img class="max-w-xs hover:scale-110 transition duration-300 ease-in-out" src="<?php echo e(asset('uploads') . '/' . $post->imagen); ?>" alt="Imagen del post <?php echo e($post->titulo); ?>">
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="my-10">
            <?php echo e($posts->links()); ?>

        </div>
    <?php else: ?>
        <p class="text-center">No hay posts, sigue a alguien para poder mostrar sus post</p>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/home.blade.php ENDPATH**/ ?>
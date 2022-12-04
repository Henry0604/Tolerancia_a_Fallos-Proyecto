

<?php $__env->startSection('titulo'); ?>
    <?php echo e($post->titulo); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <div class="container mx-auto md:flex">
        <div class="md:w-2/6">
            <img src="<?php echo e(asset('uploads') . '/' . $post->imagen); ?>" alt="Imagen del post <?php echo e($post->titulo); ?>">
            
            <div class="p-3 flex items-center gap-4">
                <?php if(auth()->guard()->check()): ?>

                    <?php if($post->checkLike(auth()->user())): ?>
                        <form method="POST" action="<?php echo e(route('posts.likes.destroy', $post)); ?>">
                            <?php echo method_field('DELETE'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>                      
                        </form>  
                    <?php else: ?>
                        <form method="POST" action="<?php echo e(route('posts.likes.store', $post)); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>                      
                        </form>      
                    <?php endif; ?>

                <?php endif; ?>

                <p class="font-bold"><?php echo e($post->likes->count()); ?> 
                    <span class="font-normal"> Likes </span>
                </p>
            </div>

            <div>
                <p class="font-bold"><?php echo e($post->user->username); ?></p>
                <p class="text-sm text-gray-500">
                    <?php echo e($post->created_at->diffForHumans()); ?>

                </p>
                <p class="mt-5">
                    <?php echo e($post->descripcion); ?>

                </p>
            </div>

            <?php if(auth()->guard()->check()): ?>
                <?php if($post->user_id === auth()->user()->id): ?>
                    <form method="POST" action="<?php echo e(route('posts.destroy', $post)); ?>">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <input 
                            type="submit"
                            value="Eliminar Publicación"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                        />
                    </form>
                <?php endif; ?>
            <?php endif; ?>

        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                <?php if(auth()->guard()->check()): ?>
                <p class="text-xl font-bold text-center mb-4">
                    Agrega un Nuevo Comentario
                </p>
                <?php if(session('mensaje')): ?>
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                        <?php echo e(session('mensaje')); ?>

                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('comentarios.store', ['post' => $post, 'user' => $user ])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                            Añade un Comentario
                        </label>
                        <textarea 
                            id="comentario" 
                            name="comentario"  
                            placeholder="Agrega un Comentario" 
                            class="border p-3 w-full rounded-lg <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        ></textarea>
    
                        <?php $__errorArgs = ['comentario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <input 
                        type="submit"
                        value="Comentar"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                    />
                </form>
                <?php endif; ?>

                <div class="bg-white shadow mb-5 max-h-96 mt-10">
                    <?php if($post->comentarios->count()): ?>
                        <?php $__currentLoopData = $post->comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="p-5 border-gray-300 border-b">
                                <a href="<?php echo e(route('posts.index', $comentario->user)); ?>" class="font-bold text-cyan-600">
                                    <?php echo e($comentario->user->username); ?>

                                </a>
                                <p><?php echo e($comentario->comentario); ?></p>
                                <p class="text-sm text-gray-500">
                                    <?php echo e($comentario->created_at->diffForHumans()); ?>

                                </p>
                            </div>  
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                    <?php else: ?>
                        <p class="p-10 text-center">
                            No Hay Comentarios Aún
                        </p>
                    <?php endif; ?>                
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/posts/show.blade.php ENDPATH**/ ?>
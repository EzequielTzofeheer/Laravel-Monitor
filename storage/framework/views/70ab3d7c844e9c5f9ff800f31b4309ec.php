<div>

     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Sites')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

                    <!-- Table Flowbite -->
                    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">

                        <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 p-4">

                            <div class="relative">
                                <input type="text" id="search" class="block w-full max-w-96 ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" placeholder="Buscar" wire:model.live.debounce.300ms="search">
                            </div>

                            <div>
                                <a href="#" class="text-white bg-blue-600 hover:bg-blue-700
                                 focus:ring-4 focus:ring-blue-300
                                 shadow-md font-medium rounded-full
                                 text-sm px-4 py-2.5 focus:outline-none"
                                >
                                    Novo
                                </a>
                            </div>

                        </div> <!-- flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 p-4 -->

                        <table class="w-full text-sm text-left rtl:text-right text-body">

                            <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-t border-default-medium">

                                <tr>

                                    <th scope="col" class="p-4">
                                        #
                                    </th>

                                    <th scope="col" class="px-6 py-3 font-medium">
                                        URL
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $sites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">

                                    <th scope="row" class="flex items-center px-6 py-4 text-heading whitespace-nowrap">
                                        <img
                                            class="w-10 h-10 rounded-full"
                                            src="<?php echo e(asset('assets/images/www.jpg')); ?>">
                                        <a href="#">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold"><?php echo e($site->user->name); ?></div>
                                                <div class="font-normal text-body"><?php echo e($site->user->email); ?></div>
                                            </div>
                                        </a>
                                    </th>

                                    <td class="px-6 py-4">
                                        <a href="#">
                                            <?php echo e($site->url); ?>

                                        </a>
                                    </td>

                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                        Nenhum registro encontrado!
                                    </td>
                                </tr>

                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            </tbody> <!-- -->

                            <tfoot>

                                <tr>
                                    <td colspan="5" class="px-6 py-4">
                                        <?php echo e($sites->links()); ?>

                                    </td>
                                </tr>

                            </tfoot> <!-- -->

                        </table> <!-- w-full text-sm text-left rtl:text-right text-body -->

                    </div> <!-- relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default -->

                </div> <!-- p-6 lg:p-8 bg-white border-b border-gray-200 -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</div> <!-- -->
<?php /**PATH /var/www/resources/views/livewire/site/index.blade.php ENDPATH**/ ?>
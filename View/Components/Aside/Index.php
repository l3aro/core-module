<?php

namespace Modules\Core\View\Components\Aside;

use Illuminate\View\Component;
use Modules\Core\Entities\Contracts\AsideContract;

class Index extends Component implements AsideContract
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public array $items = [])
    {
        $this->items = [
            // [
            //     self::PROPERTY_TYPE => self::TYPE_ITEM,
            //     self::PROPERTY_TITLE => __('Dashboard'),
            //     self::PROPERTY_LINK => route('admin.dashboard'),
            //     self::PROPERTY_ICON => 'heroicon-o-database',
            //     self::PROPERTY_ACTIVE => request()->routeIs('admin.dashboard'),
            // ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('core::components.aside.index', [
            'sidebar' => self::class,
        ]);
    }
}

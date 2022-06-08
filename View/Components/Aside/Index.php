<?php

namespace Modules\Core\View\Components\Aside;

use Illuminate\View\Component;
use Modules\Core\Entities\Contracts\AsideContract;

class Index extends Component implements AsideContract
{
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

    public function render()
    {
        return view('core::components.aside.index', [
            'sidebar' => self::class,
        ]);
    }
}

<?php

namespace Modules\Core\Entities\Contracts;

interface AsideContract
{
    const TYPE_ITEM = 'item';
    const TYPE_DIVIDER = 'divider';

    const PROPERTY_TITLE = 'title';
    const PROPERTY_LINK = 'link';
    const PROPERTY_ICON = 'icon';
    const PROPERTY_ACTIVE = 'active';
    const PROPERTY_TYPE = 'type';
}

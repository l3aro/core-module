import './bootstrap'
import select from './alpine-components/select'
import prose from './alpine-components/prose'
import Mousetrap from '@danharrin/alpine-mousetrap'
import Tooltip from '@ryangjchandler/alpine-tooltip'

Alpine.data('select', select)
Alpine.data('prose', prose)
Alpine.plugin(Mousetrap)
Alpine.plugin(Tooltip)
Alpine.start()

AOS.init()
Prism.highlightAll()
Turbo.start()
document.addEventListener('turbolinks:load', function () {
    Prism.highlightAll()
})

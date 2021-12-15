import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { library, dom } from '@fortawesome/fontawesome-svg-core'
import { faLinkedinIn, faGithub } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import VueCodeHighlight from 'vue-code-highlight'
import VueGtag from 'vue-gtag'
import Layout from './Shared/Layout/Layout.vue'
import { Inertia } from '@inertiajs/inertia'

library.add(faLinkedinIn)
library.add(faGithub)
dom.watch()

createInertiaApp({
  resolve: name => {
    const page = require(`./Pages/${name}`).default
    if (page.layout === undefined) page.layout = Layout
    return page
  },
  setup ({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(VueCodeHighlight)
      .use(VueGtag, {
        config: {
          id: props.initialPage.props.gtag,
          params: {
            send_page_view: false
          }
        }
      })
      .component('Link', Link)
      .component('Head', Head)
      .component('font-awesome-icon', FontAwesomeIcon)
      .mount(el)
  }
})

InertiaProgress.init({
  color: 'blue',
  showSpinner: true
})

Inertia.on('navigate', (event) => {
  gtag('event', 'page_view', {
    page_location: event.detail.page.url,
    send_to: this.page.props.gtag
  })
})

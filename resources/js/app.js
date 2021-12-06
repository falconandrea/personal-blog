import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { library, dom } from '@fortawesome/fontawesome-svg-core'
import { faLinkedinIn, faGithub } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import Layout from './Shared/Layout/Layout.vue'

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
      .component('Link', Link)
      .component('Head', Head)
      .component('font-awesome-icon', FontAwesomeIcon)
      .mount(el)
  },
  title: title => `${title} - AndreaFalcon.Dev`
})

InertiaProgress.init({
  color: 'blue',
  showSpinner: true
})

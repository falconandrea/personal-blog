<template>
    <Head :title="$page.props.seo_title">
        <meta name="description" :content="$page.props.seo_description" head-key="description" />
    </Head>
    <div class="p-4 w-full lg:w-2/3">
        <h1 class="mt-4 mb-2 font-medium text-2xl">Cookie Policy</h1>
        <p><small>Aggiornato il 23 dicembre 2021</small></p>
        <h3 class="mt-4 mb-2 text-lg">Cosa sono i cookie?</h3>
        <p class="pt-2 text-gray-500">I cookie e tecnologie simili sono documenti di testo molto piccoli o parti di codice che spesso contengono un codice di identificazione univoco. Quando visitate un sito web o utilizzate un'applicazione mobile, un computer chiede al vostro computer o dispositivo mobile l'autorizzazione a salvare questo file sul vostro computer o dispositivo mobile e ad accedere alle informazioni. Le informazioni raccolte attraverso i cookie e tecnologie simili possono includere la data e l'ora della visita e il modo in cui si utilizza un particolare sito web o applicazione mobile.</p>
        <h3 class="mt-4 mb-2 text-lg">Per cosa si usano i cookie</h3>
        <p class="pt-2 text-gray-500">Vengono usati dei cookie tecnici per migliorare l'esperienza e l'uso del sito web. Vengono usati anche dei cookie di analisi e statistiche (Tag Manager e Google Analytics) per capire il comportamento e la navigazione che viene fatta sul sito. Questi dati non sono in grado di identificarvi personalmente.</p>
        <h3 class="mt-4 mb-2 text-lg">I cookie usati</h3>
        <h4 class="mt-4 mb-2 text-md">Cookies necessari e tecnici</h4>
        <ul><li class="text-sm">- orchidblog_session</li><li class="text-sm">- XSRF-TOKEN</li></ul>
        <p class="pt-1 text-gray-500">Questi cookie sono necessari per il corretto funzionamento del sito web e vengono usati per ottimizzare la navigazione. Vengono usati per identificare la navigazione dell'utente e per garantire la sicurezza da attacchi cross-site request forgery (CSRF).</p>
        <h4 class="mt-4 mb-2 text-md">Cookie di prestazioni</h4>
        <ul><li class="text-sm">- _ga</li><li class="text-sm">- _gid</li><li class="text-sm">- _ga_********</li></ul>
        <p class="pt-1 text-gray-500">Questi cookie sono utilizzati per raccogliere informazioni statistiche sull'uso del sito web, detti anche cookie di analisi. Utilizzo questi dati per ottimizzare le prestazioni e il sito web. Come servizio utilizziamo Google Analytics tramite il Tag Manager, a questa pagina è possibile vedere la loro <a href="https://policies.google.com/privacy?hl=en-US" title="" target="_blank" class="underline text-gray-500">privacy policy</a> e trovare maggiori informazioni sul trattamento dei dati.</p>
        <h3 class="mt-4 mb-2 text-lg">Come puoi disattivare e rimuovere questi cookie</h3>
        <p class="pt-2 text-gray-500">È possibile scegliere di non accettare tutti i cookie tranne quelli necessari. Nelle impostazioni del browser, è possibile modificare le impostazioni per assicurarsi che i cookie vengano bloccati. La maggior parte dei browser fornisce una spiegazione su come farlo nella cosiddetta "funzione di aiuto". E' possibile anche variare le proprie scelte tramite il pulsante qui sotto e andare a cancellare i cookie che son stati installati (tranne quelli tecnici).</p>
        <button class="mt-2 text-sm text-gray-500 px-2 py-1 rounded-xl bg-blue-100 hover:bg-blue-400 hover:text-white mr-2" @click="removeCookie">Cancella cookie</button>
    </div>
</template>

<script>
export default {
    methods: {
        removeCookie() {
            localStorage.removeItem('cookie-comply')
            location.reload()
        }
    }
}
</script>

<template>
    <vue-cookie-comply
        :headerDescription="headerDescription"
        :preferencesLabel="'Preferenze'"
        :acceptAllLabel="'Accetta tutti'"
        :preferences="preferences"
        @on-accept-all-cookies="onAccept"
        @on-save-cookie-preferences="onSavePreferences"
    >
        <template v-slot:modal-header>
            <h3 class="text-center text-xl">Preferenze</h3>
        </template>
    </vue-cookie-comply>
</template>

<script>
import { bootstrap } from 'vue-gtag';
export default {
    data() {
        return {
            headerDescription: 'Il sito utilizza cookie e tecnologie simili per aiutare a personalizzare i contenuti e offrire un\'esperienza migliore. Puoi scegliere di personalizzarli facendo clic sul pulsante delle preferenze.',
            preferences: [
                {
                    title: 'Cookie Tecnici',
                    description: 'Questi sono dei cookie tecnici che servono per il corretto funzionamento del sito e sono quindi obbligatori.',
                    items: [
                        { label: 'Tecnici', value: 'technical', isRequired: true }
                    ],
                },
                {
                    title: 'Cookie Analitici',
                    description: 'Questi sono cookie che vengono utilizzati per statistiche e monitoraggio riguardo l\'utilizzo del sito web.',
                    items: [
                        { label: 'Tag Manager / Google Analytics', value: 'ga', isEnable: true }
                    ],
                },
            ]
        }
    },
    methods: {
      onAccept() {
        localStorage.setItem('cookie-comply', JSON.stringify(['technical', 'ga']))
        this.enableTracking()
      },
      onSavePreferences(preferences) {
        if(preferences.includes('ga')){
            this.enableTracking()
        }
      },
      enableTracking() {
        if (process.browser) {
            bootstrap().then((gtag) => {
                location.reload();
            })
        }
      }
    }
}
</script>

<style>
    .cookie-comply,
    .cookie-comply__modal{
        position: fixed !important;
    }
    .cookie-comply__modal-header {
        text-align: center;
    }
    .cookie-comply__modal-header h3{
        font-weight: bold;
    }
    .cookie-comply__modal-content {
        overflow-y: scroll;
        max-height: 400px;
        text-align: left;
    }
    .cookie-comply__modal-content h2{
        font-weight: bold;
        padding-top: 0.5rem;
        padding-block: 0.5rem;
    }
    .cookie-comply__modal-switches {
        padding-top: 0.5rem;
        padding-block: 0.5rem;
    }

</style>

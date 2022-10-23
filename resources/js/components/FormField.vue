<template>
    <default-field @keydown.native.stop :field="field" :errors="errors" :fullWidthContent="true">
        <template slot="field">
            <div :id="'editor-js-' + this.field.attribute" class="editor-js"></div>
        </template>
    </default-field>
</template>

<script>
    import {FormField, HandlesValidationErrors} from 'laravel-nova';

    export default {
        mixins: [FormField, HandlesValidationErrors],

        props: ['resourceName', 'resourceId', 'field'],

        methods: {
            /*
             * Set the initial, internal value for the field.
             */
            setInitialValue() {

                this.value = this.field.value;

                let self = this;

                const editor = NovaEditorJS.getInstance({
                    /**
                     * Wrapper of Editor
                     */
                    holderId: 'editor-js-' + self.field.attribute,

                    /**
                     * This Tool will be used as default
                     */
                    initialBlock: self.field.editorSettings.initialBlock,

                    /**
                     * Default placeholder
                     */
                    placeholder: self.field.editorSettings.placeholder,

                    /**
                     * Enable autofocus
                     */
                    autofocus: self.field.editorSettings.autofocus,

                    /**
                     * Initial Editor data
                     */
                    data: this.value,

                    /**
                     * Min height of editor
                     */
                    minHeight: 35,

                    onReady: function () {

                    },
                    onChange: function () {
                        editor.save().then((savedData) => {
                            self.handleChange(savedData)
                        });
                    }
                }, self.field);
            },

            /**
             * Check type
             * @param str
             */
            isJsonString(str) {
                try {
                  JSON.parse(str);
                } catch (e) {
                  return false;
                }

                return true;
            },

            /**
             * Fill the given FormData object with the field's internal value.
             */
            fill(formData) {
                let value = this.isJsonString(this.value) ? this.value : JSON.stringify(this.value);

                formData.append(this.field.attribute, value)
            },

            /**
             * Update the field's internal value.
             */
            handleChange(value) {
                this.value = value
            },
        },
    }
</script>

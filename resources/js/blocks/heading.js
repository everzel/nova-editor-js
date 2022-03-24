const AlignmentTuneTool = require('editorjs-text-alignment-blocktune');

NovaEditorJS.booting(function (editorConfig, fieldConfig) {
    if (fieldConfig.toolSettings.header.activated === true) {
        editorConfig.tools.header = {
            class: require('@editorjs/header'),
            config: {
                placeholder: fieldConfig.toolSettings.header.placeholder
            },
            shortcut: fieldConfig.toolSettings.header.shortcut,
            tunes: ['aling'],
        }
    }
});

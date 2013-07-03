/*
 * File: app/view/LinhaMapa.js
 *
 * This file was generated by Sencha Architect version 2.1.0.
 * http://www.sencha.com/products/architect/
 *
 * This file requires use of the Sencha Touch 2.0.x library, under independent license.
 * License of Sencha Architect does not include license for Sencha Touch 2.0.x. For more
 * details see http://www.sencha.com/license or contact license@sencha.com.
 *
 * This file will be auto-generated each and everytime you save your project.
 *
 * Do NOT hand edit this file.
 */

Ext.define('Ubibus.view.LinhaMapa', {
    extend: 'Ext.Panel',
    alias: 'widget.linhamapa',

    requires: [
        'Ubibus.view.mapa',
        'Ubibus.view.ToolbarMapa'
    ],

    config: {
        id: 'painelLinha',
        layout: {
            type: 'fit'
        },
        items: [
            {
                xtype: 'mapa'
            },
            {
                xtype: 'toolbarmapa'
            }
        ],
        listeners: [
            {
                fn: 'onPainelLinhaActivate',
                event: 'activate'
            },
            {
                fn: 'onPainelLinhaDeactivate',
                event: 'deactivate'
            }
        ]
    },

    onPainelLinhaActivate: function(container, newActiveItem, oldActiveItem, options) {
        Ext.getCmp('btnNavConfig').setHidden(false);
        Ext.getCmp('opcoesMapaLinha').setHidden(false);

        telaAtual = 'linha';
    },

    onPainelLinhaDeactivate: function(container, newActiveItem, oldActiveItem, options) {
        Ext.getCmp('btnNavConfig').setHidden(true);
        Ext.getCmp('opcoesMapaLinha').setHidden(true);
    }

});
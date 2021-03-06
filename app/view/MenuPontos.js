/*
 * File: app/view/MenuPontos.js
 *
 * This file was generated by Sencha Architect version 2.2.2.
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

Ext.define('Ubibus.view.MenuPontos', {
    extend: 'Ext.ActionSheet',
    alias: 'widget.menupontos',

    config: {
        id: 'menuPontos',
        hideOnMaskTap: true,
        enter: 'top',
        items: [
            {
                xtype: 'titlebar',
                docked: 'top',
                title: 'Ponto já cadastrado:'
            },
            {
                xtype: 'button',
                hidden: true,
                text: 'Usar sugestão'
            },
            {
                xtype: 'button',
                height: 25,
                text: 'Cancelar marcação'
            },
            {
                xtype: 'button',
                height: 26,
                text: 'Ponto de partida'
            },
            {
                xtype: 'button',
                height: 26,
                text: 'Ponto de chegada'
            },
            {
                xtype: 'button',
                height: 29,
                text: 'Troca sentido (Ida/Volta)'
            },
            {
                xtype: 'button',
                hidden: true,
                text: 'Usar ponto novamente'
            },
            {
                xtype: 'label',
                height: 55,
                html: 'Caso em um engarrafamento, cadastre abaixo:',
                id: 'lblinfoEngarrafamento'
            },
            {
                xtype: 'textareafield',
                height: 63,
                id: 'motivo_engarrafamento',
                label: '',
                labelAlign: 'top',
                labelWidth: '1%',
                name: 'motivo_engarrafamento',
                autoComplete: false,
                autoCorrect: false,
                maxLength: 144,
                placeHolder: 'Escreva aqui o motivo do engarrafamento (144 caracteres)',
                readOnly: false
            },
            {
                xtype: 'button',
                id: 'btnEngarrafamentoGravar',
                ui: 'action',
                text: 'Gravar motivo engarrafamento'
            }
        ]
    },

    setPontoAtual: function(idPonto) {
        this.ponto_id = window.app.pontoAtual = idPonto;

    }

});
tinymce.PluginManager.add('placeholder', function(editor) {
	console.log()
    editor.onInit.add(function() {
        var label = new Label;

        onBlur();

        tinymce.DOM.bind(label.el, 'click', onFocus);
        //editor.onFocus.add(onFocus);
        //editor.on('blur', onBlur);
        //editor.on('change', onBlur);
        editor.onSetContent.add(onBlur);

        function onFocus(){
            label.hide();
            tinyMCE.execCommand('mceFocus', false, editor);
        }

        function onBlur(){
			editor.getContent()
            if(editor.getContent() == '') {
                label.show();
            }else{
                label.hide();
            }
        }
    });

    var Label = function(){
        var placeholder_text = editor.getElement().getAttribute("placeholder") || editor.settings.placeholder;
        var placeholder_attrs = editor.settings.placeholder_attrs || {style: {position: 'absolute', top:'5px', left:0, color: '#888', padding: '1%', width:'98%', overflow: 'hidden', 'white-space': 'pre-wrap'} };
        var contentAreaContainer = editor.getContentAreaContainer();

        tinymce.DOM.setStyle(contentAreaContainer, 'position', 'relative');

        // Create label el
        this.el = tinymce.DOM.add( contentAreaContainer, "label", placeholder_attrs, placeholder_text );
    }

    Label.prototype.hide = function(){
        tinymce.DOM.setStyle( this.el, 'display', 'none' );
    }

    Label.prototype.show = function(){
        tinymce.DOM.setStyle( this.el, 'display', '' );   
    }
});

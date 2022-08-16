( function( blocks, element ) {

	const el = element.createElement;

	//const { RichText } = editor;
	const { registerBlockType } = blocks;



	const iconEmail = el('svg', { width: 20, height: 20 },
		el( 'path',
			{
				d: "M19.833 1.127c-0.144-0.129-0.349-0.163-0.527-0.088l-19 8c-0.192 0.081-0.314 0.272-0.306 0.48s0.144 0.389 0.342 0.455l5.658 1.886v5.64c0 0.212 0.133 0.4 0.333 0.471 0.055 0.019 0.111 0.029 0.167 0.029 0.148 0 0.291-0.066 0.388-0.185l2.763-3.401 4.497 4.441c0.095 0.094 0.221 0.144 0.351 0.144 0.042 0 0.084-0.005 0.125-0.016 0.17-0.044 0.305-0.174 0.355-0.343l5-17c0.055-0.185-0.003-0.385-0.147-0.514zM16.13 3.461l-9.724 7.48-4.488-1.496 14.212-5.984zM7 11.746l9.415-7.242-7.194 8.854c-0 0-0 0.001-0.001 0.001l-2.22 2.733v-4.346zM14.256 17.557l-3.972-3.922 8.033-9.887-4.061 13.808z"
			}
		)
	);


	registerBlockType( 'shaiful-gutenberg/notice-block', {
		title: 'Caracteristicas',		// Block name visible to user
    	icon: 'lightbulb',	// Toolbar icon can be either using WP Dashicons or custom SVG
    	category: 'common',	
    // 	attributes: {
    // 		exampleText: {
    // 			type: 'string',
    // 			default: ''
    // 		}
    // 	},
    // 	edit: (props) => { 
    // 		const { attributes, setAttributes } = props;
    // 		return (
    //     		el( 'div', { className: props.className },
    //     			el( 'div', { className: 'misha-block-form-wrap' },
    //     				el( 'div', {},
    //     					'Enter your email address'
    //     				),
    //     				el( 'div', {},
    //     					'Subscribe'
    //     				)
    //     			)
    //     		)
    //     	);
    // 	},
		attributes: {			// The data this block will be storing
    		type: { type: 'string', default: 'default' },			// Notice box type for loading the appropriate CSS class. Default class is 'default'.
    		title: { type: 'string' },			// Notice box title in h4 tag
    		content: { type: 'array', source: 'children', selector: 'p' }		/// Notice box content in p tag
    	},
    	edit: function(props) {    		
          function updateTitle( event ) {
    	      props.setAttributes( { title: event.target.value } );
    	   }
    
    	   function updateContent( newdata ) {
    	      props.setAttributes( { content: newdata } );
    	   }
    
    	   function updateType( newdata ) {
    	      props.setAttributes( { type: event.target.value } );
    	   }
    
    		return el( 'div', 
    			{ 
    				className: 'notice-box notice-' + props.attributes.type
    			}, 
    			el(
    				'select', 
    				{
    					onChange: updateType,
    					value: props.attributes.type,
    				},
    				el("option", {value: "default" }, "Default"),
    			  	el("option", {value: "success" }, "Success"),
    			  	el("option", {value: "danger" }, "Danger")
    			),
    			el(
    				'input', 
    				{
    					type: 'text', 
    					placeholder: 'Enter title here...',
    					value: props.attributes.title,
    					onChange: updateTitle,
    					style: { width: '100%' }
    				}
    			),
    			el(
    				wp.editor.RichText,
                {
                  tagName: 'p',
                  onChange: updateContent,
                  value: props.attributes.content,
                  placeholder: 'Enter description here...'
                }
             )
    
    		);	// End return
    
    	},	// End edit()
    	save: function(props) {
    		// How our block renders on the frontend
    		
    		return el( 'div', 
    			{ 
    				className: 'notice-box notice-' + props.attributes.type
    			}, 
    			el(
    				'h4', 
    				null,
    				props.attributes.title
    			),
    			el( wp.editor.RichText.Content, {
                tagName: 'p',
                value: props.attributes.content
             })
    			
    		);	// End return
    		
    	}

	} );
} )(
	window.wp.blocks,
	window.wp.element,
);

!function(e){var t={};function n(o){if(t[o])return t[o].exports;var r=t[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(o,r,function(t){return e[t]}.bind(null,r));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=24)}([function(e,t){e.exports=window.wp.element},function(e,t){e.exports=function(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=window.wp.components},function(e,t){function n(t){return e.exports=n=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)},e.exports.default=e.exports,e.exports.__esModule=!0,n(t)}e.exports=n,e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){function n(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}e.exports=function(e,t,o){return t&&n(e.prototype,t),o&&n(e,o),e},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t,n){var o=n(21);e.exports=function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&o(e,t)},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t,n){var o=n(22).default,r=n(2);e.exports=function(e,t){return!t||"object"!==o(t)&&"function"!=typeof t?r(e):t},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=window.wp.i18n},function(e,t,n){var o=n(17),r=n(18),a=n(19),l=n(20);e.exports=function(e){return o(e)||r(e)||a(e)||l()},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=window.wp.blockEditor},function(e,t){e.exports=window.wp.primitives},function(e,t){e.exports=function(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,o=new Array(t);n<t;n++)o[n]=e[n];return o},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=window.wp.blocks},function(e,t){e.exports=window.wp.serverSideRender},function(e){e.exports=JSON.parse('{"name":"wpadverts/manage","apiVersion":1,"textdomain":"wpadverts","title":"Classifieds Manage","icon":"megaphone","category":"wpadverts","editor_style":"wpadverts-blocks-manage","editor_script":"block-wpadverts-list","example":{},"attributes":{"post_type":{"type":"string","default":""},"query":{"type":"object","default":{}},"show_results_counter":{"type":"boolean","default":true},"switch_views":{"type":"boolean","default":true},"allow_sorting":{"type":"boolean","default":true},"show_pagination":{"type":"boolean","default":true},"posts_per_page":{"type":"integer","default":20},"display":{"type":"string","default":"grid"},"order_by":{"type":"string","default":"date-desc"},"order_by_featured":{"type":"boolean","default":true},"list_type":{"type":"string","default":"all"},"list_img_width":{"type":"integer","default":1},"list_img_height":{"type":"integer","default":1},"list_img_fit":{"type":"string","default":"contain"},"list_img_source":{"type":"string","default":"adverts-list"},"grid_columns":{"type":"string","default":"2"},"grid_columns_mobile":{"type":"string","default":"2"},"grid_img_height":{"type":"integer","default":8},"grid_img_fit":{"type":"string","default":"contain"},"grid_img_source":{"type":"string","default":"adverts-list"},"data":{"type":"array","default":[]},"default_image_url":{"type":"string","default":""},"show_image_column":{"type":"boolean","default":true},"show_price_column":{"type":"boolean","default":true},"title_source":{"type":"string","default":"default__post_title"},"alt_source":{"type":"string","default":"pattern__price"},"color_price":{"type":"string","default":"#b91c1c"},"color_title":{"type":"string","default":""},"color_bg_featured":{"type":"string","default":""},"form":{"type":"object","default":{}},"primary_button":{"type":"object","default":{}},"secondary_button":{"type":"object","default":{}}}}')},function(e,t,n){var o=n(13);e.exports=function(e){if(Array.isArray(e))return o(e)},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=function(e){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e))return Array.from(e)},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t,n){var o=n(13);e.exports=function(e,t){if(e){if("string"==typeof e)return o(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);return"Object"===n&&e.constructor&&(n=e.constructor.name),"Map"===n||"Set"===n?Array.from(e):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?o(e,t):void 0}},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){function n(t,o){return e.exports=n=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e},e.exports.default=e.exports,e.exports.__esModule=!0,n(t,o)}e.exports=n,e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){function n(t){return"function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?(e.exports=n=function(e){return typeof e},e.exports.default=e.exports,e.exports.__esModule=!0):(e.exports=n=function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},e.exports.default=e.exports,e.exports.__esModule=!0),n(t)}e.exports=n,e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=window.wp.compose},function(e,t,n){"use strict";n.r(t),n(9);var o=n(14),r=n(10),a=n.n(r),l=n(5),i=n.n(l),s=n(6),u=n.n(s),c=n(2),p=n.n(c),f=n(7),d=n.n(f),b=n(8),m=n.n(b),g=n(4),h=n.n(g),y=n(1),v=n.n(y),_=n(0),O=n(11),x=n(3),w=n(12),C=Object(_.createElement)(w.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},Object(_.createElement)(w.Path,{fillRule:"evenodd",d:"M6.863 13.644L5 13.25h-.5a.5.5 0 01-.5-.5v-3a.5.5 0 01.5-.5H5L18 6.5h2V16h-2l-3.854-.815.026.008a3.75 3.75 0 01-7.31-1.549zm1.477.313a2.251 2.251 0 004.356.921l-4.356-.921zm-2.84-3.28L18.157 8h.343v6.5h-.343L5.5 11.823v-1.146z",clipRule:"evenodd"})),j=n(15),S=n.n(j);var E=function(e){d()(r,e);var t,n,o=(t=r,n=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,o=h()(t);if(n){var r=h()(this).constructor;e=Reflect.construct(o,arguments,r)}else e=o.apply(this,arguments);return m()(this,e)});function r(e){var t;return i()(this,r),t=o.call(this,e),v()(p()(t),"getOptionLabel",(function(e){for(var n=0;n<t.props.data.builtin.data.length;n++)if(t.props.data.builtin.data[n].name===e)return t.props.data.builtin.data[n].label;for(var o=0;o<t.props.data.length;o++)for(n=0;n<t.props.data[o].data.length;n++)if(t.props.data[o].data[n].name===e)return t.props.data[o].data[n].label;return e})),v()(p()(t),"onChange",(function(e){t.value=e.target.value,t.props.onChange(t.value)})),t.value=t.props.value,t.state={mode:"normal"},t}return u()(r,[{key:"render",value:function(){var e=this.props,t=e.label,n=e.labelPosition;return Object(_.createElement)(_.Fragment,null,Object(_.createElement)(x.BaseControl,{label:t,labelPosition:n},Object(_.createElement)("select",{className:"components-select-control__input",onChange:this.onChange,value:this.value},Object(_.createElement)("option",{key:"-1",value:"-1"}),this.props.options.map((function(e,t,n){return 0===e.options.length?null:Object(_.createElement)("optgroup",{key:t,label:e.label},e.options.map((function(e,t){return Object(_.createElement)("option",{key:t,value:e.value},e.label)})))})))))}}]),r}(_.Component);function P(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}n(23);var A=function(e){d()(r,e);var t,n,o=(t=r,n=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,o=h()(t);if(n){var r=h()(this).constructor;e=Reflect.construct(o,arguments,r)}else e=o.apply(this,arguments);return m()(this,e)});function r(e){var t;return i()(this,r),t=o.call(this,e),v()(p()(t),"onChange",(function(e){"-1"!=e.target.value&&(t.addOption(e.target.value),t.props.onChange(t.data.options),e.target.value="-1")})),v()(p()(t),"onCustomizeQuery",(function(e){})),v()(p()(t),"onMove",(function(e,n){t.data.options=t.arrayMove(t.data.options,e,n),t.props.onChange(t.data.options)})),v()(p()(t),"onTrashClick",(function(e){t.data.options.splice(e,1),t.props.onChange(t.data.options)})),v()(p()(t),"getOptionLabel",(function(e){for(var n=0;n<t.props.data.builtin.data.length;n++)if(t.props.data.builtin.data[n].name===e)return t.props.data.builtin.data[n].label;for(var o=0;o<t.props.data.length;o++)for(n=0;n<t.props.data[o].data.length;n++)if(t.props.data[o].data[n].name===e)return t.props.data[o].data[n].label;return e})),t.data=function(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?P(Object(n),!0).forEach((function(t){v()(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):P(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}({text:t.props.placeholder,options:[]},e.data),t.data.options=a()(t.props.value),t.state={mode:"normal"},t}return u()(r,[{key:"shouldComponentUpdate",value:function(e){return!0}},{key:"addOption",value:function(e){this.data.options.push({name:e})}},{key:"arrayMove",value:function(e,t,n){if(n>=e.length)for(var o=n-e.length+1;o--;)e.push(void 0);return e.splice(n,0,e.splice(t,1)[0]),e}},{key:"render",value:function(){var e=this,t=this.data.options;return Object(_.createElement)(_.Fragment,null,Object(_.createElement)(x.BaseControl,{label:"List Data",labelPosition:"top"},Object(_.createElement)("select",{className:"components-select-control__input",onChange:this.onChange},Object(_.createElement)("option",{key:"-1",value:"-1"}),Object(_.createElement)("optgroup",{label:this.props.data.builtin.label},this.props.data.builtin.data.map((function(e,t){return Object(_.createElement)("option",{key:t,value:e.name},e.label)}))),this.props.data.meta.data.length>0&&Object(_.createElement)("optgroup",{label:this.props.data.meta.label},this.props.data.meta.data.map((function(e,t){return Object(_.createElement)("option",{key:t,value:e.name},e.label)}))),this.props.data.taxonomies.data.length>0&&Object(_.createElement)("optgroup",{label:this.props.data.taxonomies.label},this.props.data.taxonomies.data.map((function(e,t){return Object(_.createElement)("option",{key:t,value:e.name},e.label)})))),t.length>0&&Object(_.createElement)(_.Fragment,null,t.map((function(n,o){return Object(_.createElement)(x.Flex,{key:o},Object(_.createElement)(x.FlexBlock,{title:e.getOptionLabel(n.name),style:{textOverflow:"ellipsis",overflow:"hidden",whiteSpace:"nowrap"}},e.getOptionLabel(n.name)),Object(_.createElement)(x.FlexItem,null,Object(_.createElement)(x.Button,{label:"",variant:"trynitary",icon:"arrow-down-alt2",value:n.name,isSmall:!0,onClick:function(t){return e.onMove(o,o+1,n)},disabled:o+1>=t.length}),Object(_.createElement)(x.Button,{label:"",variant:"trynitary",icon:"arrow-up-alt2",isSmall:!0,onClick:function(t){return e.onMove(o,o-1,n)},disabled:o<=0}),Object(_.createElement)(x.Button,{label:"",variant:"trynitary",icon:"trash",isSmall:!0,onClick:function(t){return e.onTrashClick(o)}})))})))))}}]),r}(_.Component);function F(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}_.Component;var k=function(e){d()(r,e);var t,n,o=(t=r,n=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,o=h()(t);if(n){var r=h()(this).constructor;e=Reflect.construct(o,arguments,r)}else e=o.apply(this,arguments);return m()(this,e)});function r(e){var t;return i()(this,r),t=o.call(this,e),v()(p()(t),"onChangeColor",(function(e){t.props.setAttributes({color:e})})),v()(p()(t),"onFormStyleChange",(function(e){t.props.setAttributes({form_style:e})})),v()(p()(t),"onSelectPostType",(function(e){t.props.setAttributes({post_type:e,form_scheme:""})})),v()(p()(t),"onSelectFormScheme",(function(e){t.props.setAttributes({form_scheme:e})})),v()(p()(t),"onCustomizeQuery",(function(e,n){var o=function(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?F(Object(n),!0).forEach((function(t){v()(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):F(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}({},t.props.attributes.query);0===n.length?delete o[e]:o[e]=n,t.props.setAttributes({query:o})})),v()(p()(t),"getQueryParam",(function(e){return void 0===t.props.attributes.query[e]?"":t.props.attributes.query[e]})),v()(p()(t),"getAvailablePostTypes",(function(){var e=[{label:"",value:""}];return t.state.post_types.forEach((function(t,n){e.push({label:t.label,value:t.post_type})})),e})),v()(p()(t),"getCurrentPostType",(function(){return t.state.post_types[0]})),v()(p()(t),"getSelectedFormScheme",(function(e){if(""===t.props.attributes.form_scheme)return null;for(var n=t.getCurrentPostType(),o=0;o<n.form_schemes[e].length;o++)if(n.form_schemes[e][o].name===t.props.attributes.form_scheme)return n.form_schemes[e][o];return null})),v()(p()(t),"getSelectedFormSchemeData",(function(e){var n=t.getSelectedFormScheme(e);return null===n?[]:n.data})),v()(p()(t),"getAvailableSearchForms",(function(e){var n=t.getCurrentPostType();return[{label:"",value:""}].concat(n.form_schemes.search)})),v()(p()(t),"getAdvertsListData",(function(){for(var e=t.getCurrentPostType(),n={builtin:{label:"Builtin",data:e.form_schemes_default.publish},meta:{label:"Custom Fields",data:t.getSelectedFormSchemeData("publish")},taxonomies:{label:"Taxonomies",data:[]}},o=0;o<e.taxonomies.length;o++)n.taxonomies.data.push({name:"taxonomy__"+e.taxonomies[o].name,label:e.taxonomies[o].label});return n})),v()(p()(t),"initVisuals",(function(){""!==t.props.attributes.post_type&&t.setState({initiated:!0})})),v()(p()(t),"resetVisuals",(function(){t.props.setAttributes({post_type:""}),t.setState({initiated:!1,loading:!0}),t.runApiFetchForms()})),v()(p()(t),"toggleShowResultsCounter",(function(e){t.props.setAttributes({show_results_counter:e})})),v()(p()(t),"toggleSwitchViews",(function(e){t.props.setAttributes({switch_views:e})})),v()(p()(t),"toggleAllowSorting",(function(e){t.props.setAttributes({allow_sorting:e})})),v()(p()(t),"toggleShowPagination",(function(e){t.props.setAttributes({show_pagination:e})})),v()(p()(t),"onChangePostsPerPage",(function(e){t.props.setAttributes({posts_per_page:e})})),v()(p()(t),"onChangeDisplay",(function(e){t.props.setAttributes({display:e})})),v()(p()(t),"onChangeDefaultImageUrl",(function(e){t.props.setAttributes({default_image_url:e})})),v()(p()(t),"toggleShowPriceColumn",(function(e){t.props.setAttributes({show_price_column:e})})),v()(p()(t),"onListDataChange",(function(e){console.log(e),t.props.setAttributes({data:a()(e)})})),v()(p()(t),"onChangeTitleSource",(function(e){t.props.setAttributes({title_source:e})})),v()(p()(t),"toggleShowImageColumn",(function(e){t.props.setAttributes({show_image_column:e})})),v()(p()(t),"onChangeListImageWidth",(function(e){t.props.setAttributes({list_img_width:e})})),v()(p()(t),"onChangeListImageHeight",(function(e){t.props.setAttributes({list_img_height:e})})),v()(p()(t),"onChangeListImageFit",(function(e){t.props.setAttributes({list_img_fit:e})})),v()(p()(t),"onChangeListImageSource",(function(e){t.props.setAttributes({list_img_source:e})})),v()(p()(t),"onChangeGridColumns",(function(e){t.props.setAttributes({grid_columns:e})})),v()(p()(t),"onChangeGridColumnsMobile",(function(e){t.props.setAttributes({grid_columns_mobile:e})})),v()(p()(t),"onChangeGridImgHeight",(function(e){t.props.setAttributes({grid_img_height:e})})),v()(p()(t),"onChangeGridImgFit",(function(e){t.props.setAttributes({grid_img_fit:e})})),v()(p()(t),"onChangeGridImgSource",(function(e){t.props.setAttributes({grid_img_source:e})})),v()(p()(t),"onChangeOrderBy",(function(e){t.props.setAttributes({order_by:e})})),t.state={initiated:!1,post_types:[],loading:!0,show_instructions:!1},t.initVisuals(),t}return u()(r,[{key:"componentDidMount",value:function(){this.runApiFetchForms()}},{key:"runApiFetchForms",value:function(){var e=this;wp.apiFetch({path:"wpadverts/v1/classifieds-types"}).then((function(t){e.setState({post_types:t.data,loading:!1,initiated:""!==e.props.attributes.post_type})}))}},{key:"getDataOptions",value:function(){var e=this.getAdvertsListData(),t=0,n=[{label:"Builtin",options:[]},{label:"Patterns",options:[]},{label:"Custom Fields",options:[]},{label:"Taxonomies",options:[]}];for(t=0;t<e.builtin.data.length;t++)n[e.builtin.data[t].name.startsWith("pattern__")?1:0].options.push({value:e.builtin.data[t].name,label:e.builtin.data[t].label});for(t=0;t<e.meta.data.length;t++)n[2].options.push({value:e.meta.data[t].name,label:e.meta.data[t].label});for(t=0;t<e.taxonomies.data.length;t++)n[3].options.push({value:e.taxonomies.data[t].name,label:e.taxonomies.data[t].label});return n}},{key:"renderInit",value:function(){var e=this.props.attributes.post_type;return this.state.show_instructions,Object(_.createElement)(_.Fragment,null,Object(_.createElement)(x.Placeholder,{icon:C,label:"Classifieds Manage",instructions:"Select custom post type to continue.",isColumnLayout:"true"},!0===this.state.loading?Object(_.createElement)(x.Spinner,null):Object(_.createElement)(_.Fragment,null,Object(_.createElement)(x.SelectControl,{label:"Custom Post Type",labelPosition:"top",value:e,options:this.getAvailablePostTypes(),onChange:this.onSelectPostType,style:{lineHeight:"1rem"}}),Object(_.createElement)("div",null,Object(_.createElement)(x.Button,{variant:"primary",disabled:""===e,onClick:this.initVisuals},"Apply")))))}},{key:"render",value:function(){var e=this.props,t=(e.className,e.attributes),n=t.show_results_counter,o=t.switch_views,r=t.allow_sorting,a=(t.show_pagination,t.posts_per_page),l=t.data,i=t.display,s=t.default_image_url,u=t.order_by,c=(t.order_by_featured,t.list_type,t.list_img_width),p=t.list_img_height,f=t.list_img_fit,d=t.list_img_source,b=t.grid_columns,m=t.grid_columns_mobile,g=t.grid_img_height,h=t.grid_img_fit,y=t.grid_img_source,v=(t.show_price_column,t.show_image_column),w=t.title_source;return t.alt_source,t.color_price,t.color_title,t.color_bg_featured,this.state.show_instructions,Object(_.createElement)(_.Fragment,null,!0===this.state.initiated?Object(_.createElement)(_.Fragment,null,Object(_.createElement)(O.InspectorControls,null,Object(_.createElement)(x.PanelBody,{title:"Display Options",initialOpen:!0},Object(_.createElement)(x.ToggleControl,{label:"Show number of found results.",checked:n,onChange:this.toggleShowResultsCounter}),Object(_.createElement)(x.ToggleControl,{label:"Allow switching views.",checked:o,onChange:this.toggleSwitchViews}),Object(_.createElement)(x.ToggleControl,{label:"Allow sorting.",checked:r,onChange:this.toggleAllowSorting}),Object(_.createElement)(x.TextControl,{label:"Results Per Page.",value:a,onChange:this.onChangePostsPerPage,type:"number",min:"1",max:"100",step:"1"}),Object(_.createElement)(x.SelectControl,{label:"Default View",labelPosition:"top",value:i,options:[{label:"List",value:"list"},{label:"Grid",value:"grid"},{label:"Map (requires MAL extension)",value:"map"}],onChange:this.onChangeDisplay}),Object(_.createElement)(x.TextControl,{label:"Default Image URL",value:s,onChange:this.onChangeDefaultImageUrl})),Object(_.createElement)(x.PanelBody,{title:"Display Information",initialOpen:!1},Object(_.createElement)(x.ToggleControl,{label:"Show image column/row.",checked:v,onChange:this.toggleShowImageColumn}),Object(_.createElement)(A,{data:this.getAdvertsListData(),onChange:this.onListDataChange,value:l}),Object(_.createElement)(E,{label:"Title Text",labelPosition:"top",value:w,options:this.getDataOptions(),onChange:this.onChangeTitleSource})),Object(_.createElement)(x.PanelBody,{title:"List View Options",initialOpen:!1},Object(_.createElement)(x.RangeControl,{label:"Image Width",value:c,onChange:this.onChangeListImageWidth,min:0,max:10,withInputField:!1}),Object(_.createElement)(x.RangeControl,{label:"Image Height",value:p,onChange:this.onChangeListImageHeight,min:0,max:10,withInputField:!1}),Object(_.createElement)(x.SelectControl,{label:"Image Fit",labelPosition:"top",value:f,onChange:this.onChangeListImageFit,options:[{value:"none",label:"Default"},{value:"contain",label:"Contain"},{value:"cover",label:"Cover"},{value:"scale-down",label:"Scale Down"}]}),Object(_.createElement)(x.SelectControl,{label:"Use Image",labelPosition:"top",value:d,onChange:this.onChangeListImageSource,options:[{value:"adverts-upload-thumbnail",label:"Adverts - Upload Thumbnail"},{value:"adverts-list",label:"Adverts - List"},{value:"adverts-gallery",label:"Adverts - Gallery"},{value:"small",label:"Small"},{value:"medium",label:"Medium"},{value:"large",label:"Large"},{value:"full",label:"Full Size"}]})),Object(_.createElement)(x.PanelBody,{title:"Grid View Options",initialOpen:!1},Object(_.createElement)(x.TextControl,{label:"Columns in the Grid view.",value:b,onChange:this.onChangeGridColumns,type:"number",min:"1",max:"6",step:"1"}),Object(_.createElement)(x.TextControl,{label:"Columns in the mobile Grid view.",value:m,onChange:this.onChangeGridColumnsMobile,type:"number",min:"1",max:"2",step:"1"}),Object(_.createElement)(x.RangeControl,{label:"Image Height",value:g,onChange:this.onChangeGridImgHeight,min:0,max:15,withInputField:!1}),Object(_.createElement)(x.SelectControl,{label:"Image Fit",labelPosition:"top",value:h,onChange:this.onChangeGridImgFit,options:[{value:"none",label:"Default"},{value:"contain",label:"Contain"},{value:"cover",label:"Cover"},{value:"scale-down",label:"Scale Down"}]}),Object(_.createElement)(x.SelectControl,{label:"Use Image",labelPosition:"top",value:y,onChange:this.onChangeGridImgSource,options:[{value:"adverts-upload-thumbnail",label:"Adverts - Upload Thumbnail"},{value:"adverts-list",label:"Adverts - List"},{value:"adverts-gallery",label:"Adverts - Gallery"},{value:"small",label:"Small"},{value:"medium",label:"Medium"},{value:"large",label:"Large"},{value:"full",label:"Full Size"}]})),Object(_.createElement)(x.PanelBody,{title:"Filters / Basic",initialOpen:!1},Object(_.createElement)(x.SelectControl,{label:"Default Sorting and Order",labelPosition:"top",value:u,options:[{label:"Newest First",value:"date-desc"},{label:"Oldest First",value:"date-asc"},{label:"Most Expensive First",value:"price-desc"},{label:"Cheapest First",value:"price-asc"},{label:"From A to Z",value:"title-asc"},{label:"From Z to A",value:"title-desc"}],onChange:this.onChangeOrderBy}))),Object(_.createElement)(O.BlockControls,null,Object(_.createElement)(x.Toolbar,{controls:[{icon:"controls-repeat",title:"Reset post type and form scheme",onClick:this.resetVisuals}]})),Object(_.createElement)(x.Disabled,null,Object(_.createElement)(S.a,{block:"wpadverts/manage",attributes:this.props.attributes}))):Object(_.createElement)(_.Fragment,null,this.renderInit()))}}]),r}(_.Component),M=n(16);Object(o.registerBlockType)(M,{edit:k,save:function(e){return e.attributes,null}})}]);
/*

(c) Copyrights 2007 - 2008

Original idea by by Binny V A, http://www.openjs.com/scripts/events/keyboard_shortcuts/
 
jQuery Plugin by Tzury Bar Yochay 
tzury.by@gmail.com
http://evalinux.wordpress.com
http://facebook.com/profile.php?id=513676303

Project Site:

http://code.google.com/p/js-hotkeys/

License: same as jQuery license. 

USAGE:
    // simple usage
    $(document).bind('keydown', 'Ctrl+c', function(){ alert('copy anyone?');});
    
    // special options such as disableInIput
    $(document).bind('keydown', {combi:'Ctrl+x', disableInInput: true} , function() {});
*/


(function (jQuery){
    // keep reference to the original $.fn.bind and $.fn.unbind
    jQuery.fn.__bind__ = jQuery.fn.bind;
    jQuery.fn.__unbind__ = jQuery.fn.unbind;
    
    var hotkeys = {
        verison: '0.7.3',
        override: /keydown|keypress|keyup/g,        
        triggersMap: {},
        
        specialKeys: {
            27: 'esc', 9: 'tab', 32:'space', 13: 'return', 8:'backspace', 145: 'scroll', 
            20: 'capslock', 144: 'numlock', 19:'pause', 45:'insert', 36:'home', 46:'del',
            35:'end', 33: 'pageup', 34:'pagedown', 37:'left', 38:'up', 39:'right',40:'down', 
            112:'f1',113:'f2', 114:'f3', 115:'f4', 116:'f5', 117:'f6', 118:'f7', 119:'f8', 
            120:'f9', 121:'f10', 122:'f11', 123:'f12' 
        },
        
        shiftNums: {
            "`":"~", "1":"!", "2":"@", "3":"#", "4":"$", "5":"%", "6":"^", "7":"&", 
            "8":"*", "9":"(", "0":")", "-":"_", "=":"+", ";":":", "'":"\"", ",":"<", 
            ".":">",  "/":"?",  "\\":"|" },
        
        newTrigger: function (type, combi, callback) { 
            // {'keyup': {'ctrl': {cb:, propogate, disableInInput}}}
            var result = {};
            result[type] = {};
            result[type][combi] = {cb: callback, propogate: true, disableInInput: false};                
            return result;
        }
    };
    // id.
    jQuery.fn.find = function( selector ) {
        // adding this line so to retrive this later
        this.query=selector;
		var elems = jQuery.map(this, function(elem){
			return jQuery.find( selector, elem );
		});

		return this.pushStack( /[^+>] [^+>]/.test( selector ) || selector.indexOf("..") > -1 ?
			jQuery.unique( elems ) :
			elems );
	};
    
    jQuery.fn.unbind = function (type, combi, fn){
        
        if (jQuery.isFunction(combi)){
            fn = combi;
            combi = null;
        }
        
        // call jQuery original unbind
        
        if (combi && typeof combi === 'string'){
            selectorId = ((this.prevObject && this.prevObject.query) 
                            || (this[0].id && this[0].id) || this[0]).toString();
            type = type.split(' ');
            for (var x=0; x<type.length; x++){
                delete hotkeys.triggersMap[selectorId][type[x]][combi];
            }
        }
        
        return  this.__unbind__(type, fn);

    };
    
    jQuery.fn.bind = function( type, data, fn){
        var result = null;
        // grab keyup,keydown,keypress
        var handle = type.match(hotkeys.override);

        // pass the rest ot the original $.fn.bind
        var pass2jq = jQuery.trim(type.replace(hotkeys.override, ''));
                
        // relevant event type(s) 
        if(handle){
            if (typeof data === "string"){
                data = {'combi': data};
            }
            
            if(data.combi){
                for (var x=0; x < handle.length; x++){
                    var eventType = handle[x];
                    var combi = data.combi.toLowerCase(),
                        trigger = hotkeys.newTrigger(eventType, combi, fn),
                        selectorId = 
                            ((this.prevObject && this.prevObject.query) 
                                || (this[0].id && this[0].id) || this[0]).toString();
                    trigger[eventType][combi].propogate = data.propogate;
                    trigger[eventType][combi].disableInInput = data.disableInInput;
                    
                    // first time selector is binded
                    if (!hotkeys.triggersMap[selectorId]) {
                        hotkeys.triggersMap[selectorId] = trigger;
                    }
                    // first time selector is binded with this type
                    else if (!hotkeys.triggersMap[selectorId][eventType]) {
                        hotkeys.triggersMap[selectorId][eventType] = trigger[eventType];
                    }
                    // currently overriding previous settings
                    else{
                        hotkeys.triggersMap[selectorId][eventType][combi] = trigger[eventType][combi];
                    }
                    
                    // add attribute and call $.event.add per matched element
                    result = this.each(function(){
                        // jQuery wrapper for the current element
                        var jqElem = jQuery(this);
                        
                        // element already associated with another collection
                        if (jqElem.attr('hkId') && jqElem.attr('hkId') !== selectorId){
                            selectorId = jqElem.attr('hkId') + ";" + selectorId;
                        }
                        
                        jqElem.attr('hkId', selectorId);
                        jQuery.event.add(this, eventType, hotkeys.handler);
                    });
                    
                }
            }
        }
        // see if there are other types, pass them to the original $.fn.bind
        if (pass2jq){
            // call original jQuery.bind()
            result = this.__bind__(pass2jq, data, fn);
        }
        return result;

    };

    hotkeys.findElement = function (elem){
        if (!jQuery(elem).attr('hkId')){
            if (jQuery.browser.opera || jQuery.browser.safari){
                while (!jQuery(elem).attr('hkId') && elem.parentNode){
                    elem = elem.parentNode;
                }
            }            
        }
        return elem;
    },
    
    // the event handler
    hotkeys.handler = function(event) {
        var target = hotkeys.findElement(event.currentTarget), 
            jTarget = jQuery(target),
            ids = jTarget.attr('hkId');
        
        if(ids){
            ids = ids.split(';');
            var code = event.which,
                type = event.type,
                special = hotkeys.specialKeys[code],
                // prevent f5 overlapping with 't' (or f4 with 's', etc.)
                character = !special && String.fromCharCode(code).toLowerCase(),
                shift = event.shiftKey,
                ctrl = event.ctrlKey,            
                // patch for jquery 1.2.5 && 1.2.6 see more at:  
                // http://groups.google.com/group/jquery-en/browse_thread/thread/83e10b3bb1f1c32b
                alt = event.altKey || event.originalEvent.altKey;
            
            mapPoint = null;
            for (var x=0; x < ids.length; x++){
                if (hotkeys.triggersMap[ids[x]][type]){
                    mapPoint = hotkeys.triggersMap[ids[x]][type];
                    break;
                }
            }
            
            //find by: id.type.combi.options            
            if (mapPoint){ 
                var trigger;
                // event type is associated with the hkId
                if(!shift && !ctrl && !alt) { // No Modifiers
                    trigger = mapPoint[special] ||  (character && mapPoint[character]);
                }
                else{
                    // check combinaitons (alt|ctrl|shift+anything)
                    var modif = '';
                    if(alt) modif +='alt+';
                    if(ctrl) modif+= 'ctrl+';
                    if(shift) modif += 'shift+';
                    
                    // modifiers + special keys or modifiers + characters or modifiers + shift characters
                    trigger = mapPoint[modif+special];
                    if (!trigger){
                        if (character){
                            trigger = mapPoint[modif+character] || mapPoint[modif+hotkeys.shiftNums[character]];
                        }
                    }
                }
                if (trigger){
                    if(trigger.disableInInput && 
                        (jTarget.is("input") || jTarget.is("textarea"))) { 
                            return;
                    }

                    // call the registered callback function
                    trigger.cb(event);
                    if(!trigger.propagate) {
                        event.stopPropagation();
                        event.preventDefault();
                        return true;
                    }
                    else{
                        return false;
                    }
                }
                else{
                    // no match, return true
                    return true;
                }
            }
            else{
                // no match, return true
                return true;
            }
        }
    };
    // place it under window so it can be extended and overriden by others
    window.hotkeys = hotkeys;
    return jQuery;
})(jQuery);

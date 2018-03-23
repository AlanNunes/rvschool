/**
 * Created by Luan on 23/03/2018.
 */

function DOM_Element() {
    this.initialize.apply(this, arguments);
}

DOM_Element.prototype.initialize = function(element, nodeClass, nodeId, attributes, content){
    var self = this;
    this.element = document.createElement(element);
    attributes = attributes || [];
    if(content) this.element.innerHTML = content;
    if(nodeClass) this.element.className = nodeClass;
    if(nodeId) this.element.id = nodeId;
    $(document).ready(function() {
        for(var i = 0;i < attributes.length;i++) {
            var attribute = attributes[i];
            $(self.element).attr(attribute.name, attribute.value);
        }
    });
};

DOM_Element.prototype.addToDOM = function(DOMElement) {
    DOMElement.appendChild(this.element);
};

DOM_Element.prototype.appendChild = function(node) {
    this.element.appendChild(node);
};

DOM_Element.prototype.changeContent = function(content) {
    this.element.innerHTML = content;
};

DOM_Element.prototype.changeClass = function(nodeClass) {
    this.element.className = nodeClass;
};

DOM_Element.prototype.changeAttribute = function(attribute) {
    var self = this;
    $(document).ready(function() {
        $(this.element).attr(attribute.name, attribute.value);
    });
};

DOM_Element.prototype.click = function(handler) {
    var self = this;
    $(document).ready(function() {
        $(self.element).click(handler);
    })
};

DOM_Element.prototype.removeClick = function() {
    var self = this;
    $(document).ready(function(){
        $(self.element).unbind("click");
    });
};

DOM_Element.prototype.mouseDown = function(handler) {
    var self = this;
    $(document).ready(function (){
        $(self.element).mousedown(handler);
    });
};

DOM_Element.prototype.removeMouseDown = function() {
    var self = this;
    $(document).ready(function() {
        $(self.element).unbind("mousedown");
    });
};

DOM_Element.prototype.mouseUp = function(handler) {
    var self = this;
    $(document).ready(function() {
        $(self.element).mouseup(handler);
    })
};

DOM_Element.prototype.removeMouseUp = function() {
    var self = this;
    $(document).ready(function() {
        $(self.element).unbind("mouseup");
    })
};

DOM_Element.prototype.hover = function(handlerIn, handlerOut) {
    var self = this;
    $(document).ready(function() {
        $(self.element).hover(handlerIn, handlerOut);
    });
};

DOM_Element.prototype.removeHover = function() {
    var self = this;
    $(document).ready(function() {
        $(self.element).unbind("mouseenter mouseleave");
    })
};

DOM_Element.prototype.mouseEnter = function(handler) {
    var self = this;
    $(document).ready(function() {
        $(self.element).mouseenter(handler);
    });
};

DOM_Element.prototype.removeMouseEnter = function() {
    var self = this;
    $(document).redy(function() {
        $(self.element).unbind("mouseenter");
    });
};

DOM_Element.prototype.mouseLeave = function(handler) {
    var self = this;
    $(document).ready(function() {
        $(self.element).mouseleave(handler);
    });
};

DOM_Element.prototype.removeMouseLeave = function() {
    var self = this;
    $(document).ready(function() {
        $(self.element).unbind("mouseleave");
    });
};
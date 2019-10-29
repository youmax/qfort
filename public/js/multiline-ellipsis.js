/**
 *  Name: Multi-line Ellipsis
 *  Author: Thomas Nicolosi
 *  Version: 2.0.0
 *  Description: Adds overflow ellipsis to multi-line content.
 *
 *  Usage:
 *    $([selector]).ellipsis()
 *    
 *  Note: Selector points to element(s) containing text.
 *      Text containing element should have css set to
 *      overflow: hidden
 *
 *  Reference to similar technique (#3):
 *      http://hackingui.com/front-end/a-pure-css-solution-for-multiline-text-truncation/
 * 
 *  Demo:
 *      https://jsbin.com/yizazid/17/edit?html,js,output
 */
(function($){
	
	$.fn.ellipsis = function() {
		
		function makeEllipsis($el) {
			var eDom = $el.get(0);
			var t = $el.attr('data-initial-text');
			// Add back the original text and recalculate on resize.
			// Return if value of original text is undefined.
			if (typeof t !== 'undefined') {
				$el.text(t);
			} else {
				return;
			}
			// Return early if the text fits the container.
			if (eDom.scrollHeight - eDom.offsetHeight <= 0) {
				return;
			}
			// Add ellipsis and recalculate.
			t = t + '...';
			do {
			  t = t.slice(0, -4);
			  $el.text(t + '...');
			} while (eDom.scrollHeight - eDom.offsetHeight > 0);
		}
		
		this.each(function () {
			var elem = $(this);
			// Store the intial text.
			elem.attr('data-initial-text', elem.text());
			// Add ellipsis for overflow
			makeEllipsis(elem);
			// Recalculate after resizing the window.
			$(window).resize(function(){
				makeEllipsis(elem);
			});
		});
		
		return this;
	}
}(jQuery))

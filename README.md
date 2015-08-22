bactrian
========

This is a Craft (buildwithcraft.com) plugin without user interface, which installs two Twig filters for string modification. One has to do with camelcase, thus the two-humped name.

Include by putting the bactrian folder intact into your Craft plugins folder. Then go to the Control Panel plugins section, and click the button to install Bactrian.

### What do the filters do?

* **camelspace** takes a string with spaces in it, and converts to a non-spaced camel-cased name. In other words, "My photo name" will become "myPhotoName", which is handy if for example you need to use it to form a CSS #id.
* **spacedashes** on the other hand is used to convert hyphen dashes to spaces. It does the same, actually, for underscores. Thus "my-photo_name" would become "my photo name". This would be convenient if you want to use the kinds of names that come on purchased images as proper titles.

### Example Craft usages:

We'll stick close to fixing uploaded photo names, but you may have other uses in mind.

If entry.craftVar contains the input, then:

    // input 'this is my cat photo'
	// output 'thisIsMyCatPhoto
	{{ entry.craftVar | camelspace }}

    // input 'this_is-my-cat_photo'
	// output'this is my cat photo'
	{{ entry.craftVar | spacedashes }}

    // input 'this_is-my-cat_photo'
	// output'thisIsMyCatPhoto'
    {{ entry.craftVar | spacedashes | camelspace }}

    // input 'this_is-my-cat_photo'
	// output'This is my cat photo'
    {{ entry.craftVar | spacedashes | ucfirst }}

    // input 'this_is-my-cat_photo'
	// output'This Is My Cat Photo'
    {{ entry.craftVar | spacedashes | ucwords }}

# SilverStripe 3 Namespaced Templates 

SilverStripe module to ease the use of templates for classes with namespaces in SilverStripe 3

    >>> \zauberfisch\NamespaceTemplates\View\SSViewer::get_templates_by_class('zauberfisch\NamespaceTemplates\Form\CompositeField', '', 'FormField');
    [
        'zauberfisch-NamespaceTemplates-Form-CompositeField',
        'NamespaceTemplates-Form-CompositeField',
        'CompositeField',
        'FormField',
    ]
    
    # class foo\bar\Class1 extends foo\bar\Class2
    # class foo\bar\Class2 extends foo\Class3
    # class foo\Class3 extends ViewableData
    
    >>> \zauberfisch\NamespaceTemplates\View\SSViewer::get_templates_by_class('foo\bar\Class1', '', 'ViewableData');
    [
        'foo-bar-Class1',
        'bar-Class1', // stripped potential vendor prefix
        'foo-bar-Class2',
        'bar-Class2', // stripped potential vendor prefix
        'foo-Class3',
        'class3', // stripped potential vendor prefix
        'ViewableData',
    ]

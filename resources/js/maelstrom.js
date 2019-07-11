import Registry from '@maelstrom-cms/toolkit/js/support/Registry'

import Dashboard from './admin/Dashboard'
import ColourColumn from './admin/ColourColumn'
import TagsColumn from './admin/TagsColumn'

Registry.register({
    Dashboard,
    ColourColumn,
    TagsColumn,
});

require('@maelstrom-cms/toolkit');

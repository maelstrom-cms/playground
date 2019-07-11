import React from 'react';
import { Tag } from 'antd';
import ParseProps from "@maelstrom-cms/toolkit/js/support/ParseProps";

export default class TagsColumn extends React.Component
{
    render() {
        const tags = ParseProps(this.props, 'text', [])

        return (
            <div>
                { tags.map(tag => <Tag key={ tag }>{ tag }</Tag>)}
            </div>
        )
    }
}

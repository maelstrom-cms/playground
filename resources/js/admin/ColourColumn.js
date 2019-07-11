import React from 'react';

export default class ColourColumn extends React.Component
{
    render() {
        const colour = this.props.text;

        const style = {
            backgroundColor: colour,
        };

        return <span className="rounded-full w-8 h-8 inline-block" style={style} title={colour} />
    }
}

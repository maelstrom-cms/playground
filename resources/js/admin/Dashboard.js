import React from 'react';
import moment from 'moment';
import { Comment, Avatar, Form, Button, List, Input, Empty, Table, Divider, Tag, Timeline, Row, Col, Statistic, Calendar, Card, Icon } from 'antd';

const { TextArea } = Input;
const { Meta } = Card;

const CommentList = ({ comments }) => (
    <List
        dataSource={comments}
        header={`${comments.length} ${comments.length > 1 ? 'replies' : 'reply'}`}
        itemLayout="horizontal"
        renderItem={props => <Comment {...props} />}
    />
);

const Editor = ({ onChange, onSubmit, submitting, value }) => (
    <div>
        <Form.Item>
            <TextArea rows={4} onChange={onChange} value={value} />
        </Form.Item>
        <Form.Item>
            <Button htmlType="submit" loading={submitting} onClick={onSubmit} type="primary">
                Add Admin Note
            </Button>
        </Form.Item>
    </div>
);

const columns = [
    {
        title: 'Name',
        dataIndex: 'name',
        key: 'name',
        render: text => <a href="javascript:;">{text}</a>,
    },
    {
        title: 'Age',
        dataIndex: 'age',
        key: 'age',
    },
    {
        title: 'Address',
        dataIndex: 'address',
        key: 'address',
    },
    {
        title: 'Tags',
        key: 'tags',
        dataIndex: 'tags',
        render: tags => (
            <span>
        {tags.map(tag => {
            let color = tag.length > 5 ? 'geekblue' : 'green';
            if (tag === 'loser') {
                color = 'volcano';
            }
            return (
                <Tag color={color} key={tag}>
                    {tag.toUpperCase()}
                </Tag>
            );
        })}
      </span>
        ),
    },
    {
        title: 'Action',
        key: 'action',
        render: (text, record) => (
            <span>
        <a href="javascript:;">Invite {record.name}</a>
        <Divider type="vertical" />
        <a href="javascript:;">Delete</a>
      </span>
        ),
    },
];

const data = [
    {
        key: '1',
        name: 'John Brown',
        age: 32,
        address: 'New York No. 1 Lake Park',
        tags: ['nice', 'developer'],
    },
    {
        key: '2',
        name: 'Jim Green',
        age: 42,
        address: 'London No. 1 Lake Park',
        tags: ['loser'],
    },
    {
        key: '3',
        name: 'Joe Black',
        age: 32,
        address: 'Sidney No. 1 Lake Park',
        tags: ['cool', 'teacher'],
    },
];

export default class Dashboard extends React.Component {
    state = {
        comments: [],
        submitting: false,
        value: '',
    };

    handleSubmit = () => {
        if (!this.state.value) {
            return;
        }

        this.setState({
            submitting: true,
        });

        setTimeout(() => {
            this.setState({
                submitting: false,
                value: '',
                comments: [
                    {
                        author: 'Han Solo',
                        avatar: 'https://zos.alipayobjects.com/rmsportal/ODTLcjxAfvqbxHnVXCYX.png',
                        content: <p>{this.state.value}</p>,
                        datetime: moment().fromNow(),
                    },
                    ...this.state.comments,
                ],
            }, () => {
                window.dispatchEvent(new Event('resize'))
            });
        }, 500);
    };

    handleChange = e => {
        this.setState({
            value: e.target.value,
        });
    };

    render() {
        const { comments, submitting, value } = this.state;

        return (
            <div className="flex flex-wrap">

                <div className="w-full">
                    <div>
                        {comments.length > 0 && <CommentList comments={comments} />}
                        <Comment
                            avatar={
                                <Avatar
                                    src="https://zos.alipayobjects.com/rmsportal/ODTLcjxAfvqbxHnVXCYX.png"
                                    alt="Han Solo"
                                />
                            }
                            content={
                                <Editor
                                    onChange={this.handleChange}
                                    onSubmit={this.handleSubmit}
                                    submitting={submitting}
                                    value={value}
                                />
                            }
                        />
                    </div>
                </div>

                <div className="w-full">
                    <Table columns={columns} dataSource={data} />
                </div>

                <div className="w-1/3">
                    <Row gutter={16}>
                        <Col span={12}>
                            <Statistic title="Active Users" value={112893} />
                        </Col>
                        <Col span={12}>
                            <Statistic title="Account Balance (CNY)" value={112893} precision={2} />
                            <Button style={{ marginTop: 16 }} type="primary">
                                Recharge
                            </Button>
                        </Col>
                    </Row>
                </div>

                <div className="w-1/3">
                    <Timeline>
                        <Timeline.Item color="green">Create a services site 2015-09-01</Timeline.Item>
                        <Timeline.Item color="green">Create a services site 2015-09-01</Timeline.Item>
                        <Timeline.Item color="red">
                            <p>Solve initial network problems 1</p>
                            <p>Solve initial network problems 2</p>
                            <p>Solve initial network problems 3 2015-09-01</p>
                        </Timeline.Item>
                        <Timeline.Item>
                            <p>Technical testing 1</p>
                            <p>Technical testing 2</p>
                            <p>Technical testing 3 2015-09-01</p>
                        </Timeline.Item>
                    </Timeline>
                </div>

                <div className="w-1/3">
                    <Card
                        style={{ width: 300 }}
                        cover={
                            <img
                                alt="example"
                                src="https://gw.alipayobjects.com/zos/rmsportal/JiqGstEfoWAOHiTxclqi.png"
                                onLoad={() => window.dispatchEvent(new Event('resize')) }
                            />
                        }
                        actions={[<Icon type="setting" />, <Icon type="edit" />, <Icon type="ellipsis" />]}
                    >
                        <Meta
                            avatar={<Avatar src="https://zos.alipayobjects.com/rmsportal/ODTLcjxAfvqbxHnVXCYX.png" />}
                            title="Card title"
                            description="This is the description"
                        />
                    </Card>
                </div>

                <div className="w-full mt-20">
                    <Calendar />
                </div>

                <div className="w-full py-10">
                    <Empty
                        image="https://gw.alipayobjects.com/mdn/miniapp_social/afts/img/A*pevERLJC9v0AAAAAAAAAAABjAQAAAQ/original"
                        imageStyle={{
                            height: 60,
                        }}
                        description={ <span>Customize <a href="#API">Description</a></span>}
                    >
                        <Button type="primary">Create Now</Button>
                    </Empty>
                </div>

            </div>
        );
    }
}

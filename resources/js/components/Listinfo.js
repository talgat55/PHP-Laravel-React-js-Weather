import React from 'react';

const ListInfo = ({title, contentOne, contentTwo}) => {
    return (
        <div className="item col-lg-3 col-md-6 col-sm-12">
            <div className="heading">
                {title}
            </div>
            <div className="content">
                {contentOne} <span>{contentTwo}</span>
            </div>
        </div>
    );
};
export default ListInfo;

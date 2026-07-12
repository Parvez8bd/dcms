import React, { Component } from 'react'
import ReactDOM from "react-dom";
import axios from "axios";

export default class Address extends Component {
    constructor(props) {
        super(props);

        // state 
        this.state = {
            id: "",
            contact_id: "",
            divisions: JSON.parse(this.props.divisions),
            division_id: "",
            districts: [],
            district_id: "",
            upazilas: [],
            upazila_id: "",
            unions: [],
            union_id: "",
            address: "",
            errors: JSON.parse(this.props.errors)
        };

        console.log(this.state);
        console.log(this.props);
    }

    divisionHandler = (e) => {
        // set division id
        this.setState({
            division_id: e.target.value
        }, this.getDistricts(e.target.value)); // get all the districts
    }

    districtHandler = (e) => {
        // set district id
        this.setState({
            district_id: e.target.value
        }, this.getUpazilas(e.target.value)); // get all the upazila
    };

    getDistricts(id) {
        axios
            .post(baseURL + "axios/getAllDistrictsFromDivision", {
                division_id: id,
            })
            .then((response) => {
                // update state
                this.setState({
                    districts: response.data
                });

                console.log(response.data);
            })
            .catch((reason) => {
                console.log(reason);
            });
    }

    upazilaHandler = (e) => {
        // set district id
        this.setState({
            upazila_id: e.target.value
        }, this.getUnions(e.target.value)); // get all the union
    };

    getUpazilas(id) {
        axios
            .post(baseURL + "axios/getAllUpazilasFromDistrict", {
                district_id: id,
            })
            .then((response) => {
                // update state
                this.setState({
                    upazilas: response.data
                });

                console.log(response.data);
            })
            .catch((reason) => {
                console.log(reason);
            });
    }

    unionHandler = (e) => {
        // set union id
        this.setState({
            union_id: e.target.value
        });
    };
    
    getUnions(id) {
        axios
            .post(baseURL + "axios/getAllUnionsFromUpazila", {
                upazila_id: id,
            })
            .then((response) => {
                // update state
                this.setState({
                    unions: response.data
                });

                console.log(response.data);
            })
            .catch((reason) => {
                console.log(reason);
            });
    }

    render() {

        return (
            <>
                {/* division */}
                <div className="mb-3 row">
                    <div className="col-2">
                        <label htmlFor="address-division" className="mt-1 form-label required">Division</label>
                    </div>

                    <div className="col-4">
                        <select name="division_id" defaultValue={ this.state.division_id } onChange={ this.divisionHandler } className="form-control" id="address-division" required>
                            <option value="">-- </option>
                            { this.state.divisions.map((division, index) => (
                            <option value={ division.id } key={ index }>
                                {division.name_en} ({ division.name_bn })
                            </option>
                            )) }
                        </select>
                            
                        {/* errors */}
                        <small className="text-danger">{ this.state.errors['division_id'] !== undefined ? this.state.errors['division_id'][0] : '' }</small>
                    </div>
                </div>
                {/* division end */}

                {/* district */}
                <div className="mb-3 row">
                    <div className="col-2">
                        <label htmlFor="address-district" className="mt-1 form-label required">District</label>
                    </div>

                    <div className="col-4">
                        <select name="district_id" defaultValue={ this.state.district_id } onChange={ this.districtHandler }  className="form-control" id="address-district" required>
                            <option value="">--</option>
                            { this.state.districts.map((district, index) => (
                            <option value={ district.id } key={ index }>
                                {district.name_en} ({district.name_bn})
                            </option>
                            )) }
                        </select>

                        {/* errors */}
                        <small className="text-danger">{ this.state.errors['district_id'] !== undefined ? this.state.errors['district_id'][0] : '' }</small>
                    </div>
                </div>
                {/* district end */}

                {/* upazila */}
                <div className="mb-3 row">
                    <div className="col-2">
                        <label htmlFor="address-upazila" className="mt-1 form-label">Upazila</label>
                    </div>

                    <div className="col-4">
                        <select name="upazila_id" defaultValue={ this.state.upazila_id } onChange={ this.upazilaHandler } className="form-control" id="address-upazila">
                            <option value="">--</option>
                            { this.state.upazilas.map((upazila, index) => (
                            <option value={ upazila.id } key={ index } >
                                { upazila.name_en } ({ upazila.name_bn })
                            </option>
                            )) }
                        </select>

                        {/* errors */}
                        <small className="text-danger">{ this.state.errors['upazila_id'] !== undefined ? this.state.errors['upazila_id'][0] : '' }</small>
                    </div>
                </div>
                {/* upazila end */}

                {/* upazila */}
                <div className="mb-3 row">
                    <div className="col-2">
                        <label htmlFor="address-union" className="mt-1 form-label">Union </label>
                    </div>

                    <div className="col-4">
                        <select name="union_id" defaultValue={ this.state.union_id } onChange={ this.unionHandler } className="form-control" id="address-union">
                            <option value="">--</option>
                            { this.state.unions.map((union, index) => (
                            <option value={ union.id } key={ index } >
                                { union.name_en } ({ union.name_bn })
                            </option>
                            )) }
                        </select>

                        {/* errors */}
                        <small className="text-danger">{ this.state.errors['union_id'] !== undefined ? this.state.errors['union_id'][0] : '' }</small>
                    </div>
                </div>
                {/* upazila end */}

                {/* more details */}
                <div className="mb-3 row">
                    <div className="col-2">
                        <label htmlFor="address-more" className="mt-1 form-label">More details</label>
                    </div>

                    <div className="col-6">
                        <textarea name="address" defaultValue={ this.state.address } className="form-control" id="address-more"  placeholder="Optional"></textarea>

                        {/* errors */}
                        <small className="text-danger">{ this.state.errors['address'] !== undefined ? this.state.errors['address'][0] : '' }</small>
                    </div>
                </div>
                {/* more details end */}
            </>
        )
    }
}

// DOM element 
if (document.getElementById("address")) {
    // find element by id
    const element = document.getElementById("address");

    // create new props object with element's data-attributes
    const props = Object.assign({}, element.dataset);

    // render element with props (using spread)
    ReactDOM.render(<Address {...props} />, element);
}

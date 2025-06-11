


const Delete=({ onConfirm, doctor_Id })=>{


return(

 <>
      
     

     
      <div
        className="modal fade"
        id="deleteModal"
        tabIndex="-1"
        aria-labelledby="deleteModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog">
          <div className="modal-content">
            <div className="modal-header">
              <h5 className="modal-title" id="deleteModalLabel"> Delete Doctor</h5>
              <button
                type="button"
                className="btn-close"
                data-bs-dismiss="modal"
                aria-label="close"
              ></button>
            </div>
            <div className="modal-body">
              Are you sure you want to delete the doctor?
            </div>
            <div className="modal-footer">
              <button
                type="button"
                className="btn btn-primary"
                data-bs-dismiss="modal"
              >
                Cancel
              </button>
              <button type="button" className="btn btn-danger"  onClick={() => onConfirm(doctor_Id)}> Delete </button>
            </div>
          </div>
        </div>
      </div>
    </>
)
}
export default Delete;
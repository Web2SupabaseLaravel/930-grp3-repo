




const Buttons=(props)=>{
return(


<input type={props.type} src={props.src} className={props.className} id={props.id} value={props.value} style={props.style} data-bs-toggle={props["data-bs-toggle"]} data-bs-target={props["data-bs-target"]} disabled={props.disabled}  onClick={props.onClick}/>

)
}
export default Buttons;
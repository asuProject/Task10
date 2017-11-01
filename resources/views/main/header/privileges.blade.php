{{-- privilges --}}
<div>
    <table style="border: none">
        <tbody>
        <tr style="background-color: white;">
            <td style="width: 24%;"><span
                        class="formLabel">Your Current Role in CHEP-SIS is </span></td>
            <td><select id="priv" name="priv"
                        onchange="location.href = 'http://127.0.0.1/cheptest/Login/changePriv/'+(this.options[this.selectedIndex].value)+'/'+$('#priv option:selected').attr('progId');">
                    <option value="">-- Change Privilege --</option>
                    <option value="9" progid="6">Academic Advisor of Computer Engineering and
                        Software Systems Program
                    </option>
                    <option value="9" progid="3">Academic Advisor of Communication Systems
                        Engineering Program
                    </option>
                    <option selected="selected" value="5" progid="-1">CHEP Accountant</option>
                    <option value="15" progid="-1">CHEP Board Member</option>
                    <option value="8" progid="-1">CHEP Control</option>
                    <option value="32" progid="-1">CHEP IT Assistant</option>
                    <option value="21" progid="-1">CHEP Vice-Director for Information Systems
                        and Academic Development
                    </option>
                    <option value="20" progid="-1">CHEP Vice-Director for Programs Coordination
                        and Academic Advising
                    </option>
                    <option value="17" progid="-1">CHEP Vice-Director for Students’ Affairs
                    </option>
                    <option value="10" progid="-1">Course Coordinator</option>
                    <option value="18" progid="-1">Executive Committee Member</option>
                    <option value="14" progid="-1">Faculty Control Head</option>
                    <option value="35" progid="-1">Freshmen Academic Coordinator</option>
                    <option value="34" progid="-1">IS Assitant</option>
                    <option value="27" progid="-1">IT Unit Specialist</option>
                    <option value="33" progid="-1">LMS Admin</option>
                    <option value="11" progid="1">Students' Affairs Personnel of Building
                        Engineering Program
                    </option>
                    <option value="11" progid="6">Students' Affairs Personnel of Computer
                        Engineering and Software Systems Program
                    </option>
                    <option value="2" progid="-1">Teaching Staff</option>
                    <option value="6" progid="7">Unit Head of Landscape Architecture Program
                    </option>
                    <option value="6" progid="3">Unit Head of Communication Systems Engineering
                        Program
                    </option>
                    <option value="6" progid="8">Unit Head of Mechatronics Engineering and
                        Automation Program
                    </option>
                    <option value="6" progid="4">Unit Head of Manufacturing Engineering
                        Program
                    </option>
                    <option value="6" progid="9">Unit Head of Environmental Architecture and
                        Urbanism Program
                    </option>
                    <option value="6" progid="5">Unit Head of Energy and Renewable Energy
                        Engineering Program
                    </option>
                    <option value="6" progid="1">Unit Head of Building Engineering Program
                    </option>
                    <option value="6" progid="6">Unit Head of Computer Engineering and Software
                        Systems Program
                    </option>
                    <option value="6" progid="2">Unit Head of Materials Engineering Program
                    </option>
                    <option value="13" progid="-1">Vice-Dean for Students' Affairs</option>
                </select></td>
        </tr>

        </tbody>
    </table>
</div>
{{-- end privilges--}}